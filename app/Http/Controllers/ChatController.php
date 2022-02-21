<?php

namespace App\Http\Controllers;

use App\Models\Chat;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Ramsey\Uuid\Uuid;

class ChatController extends Controller
{
    /**
     * @var string|null
     */
    public string|null $errorMessage = null;

    /**
     * Get the user chats list.
     */
    public function index()
    {
        $chats = Chat::with(['fromUser', 'toUser'])
            ->where('from_user_id', Auth::id())
            ->orWhere('to_user_id', Auth::id())
            ->get();

        return view('chats', [
            'chats' => $chats,
            'errorMessage' => $this->errorMessage
        ]);
    }

    /**
     * Return a chat by its uuid.
     */
    public function show(string $uuid): View|Factory|string|Application
    {
        $chat = Chat::query()
            ->where('uuid', $uuid)
            ->where(function ($query) {
                return $query->where('from_user_id', Auth::id())
                    ->orWhere('to_user_id', Auth::id());
            })->exists();

        // Check user has requested chat.
        if (! $chat) {
            $this->errorMessage = 'Could not find the chat!';

            return $this->index();
        }

        // Get Messages.
        $messages = ChatMessage::query()
            ->whereHas('chat', function ($query) use ($uuid) {
                return $query->where('uuid', $uuid);
            })
            ->get();

        return view('chat', [
            'messages' => $messages,
            'chatId' => $uuid
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws ValidationException
     */
    public function storeMessage(Request $request): mixed
    {
        $this->validate($request, [
            'chatId' => 'required|string',
            'message' => 'required|string',
            'fromUser' => 'required|int'
        ]);

        $chat = Chat::query()
            ->where('uuid', $request->post('chatId'))
            ->where(function ($query) use ($request) {
                return $query->where('from_user_id', $request->post('fromUser'))
                    ->orWhere('to_user_id', $request->post('fromUser'));
            })
            ->firstOrFail();

        $toUserId = ($request->post('fromUser') == $chat->from_user_id)
            ? $chat->to_user_id
            : $chat->from_user_id;

        $message = ChatMessage::query()
            ->create([
                'chat_id' => $chat->id,
                'from_user_id' => $request->post('fromUser'),
                'to_user_id' => $toUserId,
                'message' => $request->post('message')
            ]);

        $chat->updated_at = now();

        $chat->save();
        $message->save();

        return response()
            ->json([
                'success' => true,
            ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function getUnseenMessages(Request $request)
    {
        $this->validate($request, [
            'lastChatId' => 'required|int',
            'chatId' => 'required|string'
        ]);

        // Get Messages.
        $messages = ChatMessage::query()
            ->whereHas('chat', function ($query) use ($request) {
                return $query->where('uuid', $request->get('chatId'));
            })
            ->where('id', '>', $request->get('lastChatId'))
            ->orderBy('created_at')
            ->get();

        foreach ($messages as $key => $message) {
            $messages[$key]->created_at_time
                = $messages[$key]->created_at->format('H:i:s');
        }

        return response()
            ->json([
                'success' => true,
                'messages' => $messages
            ]);
    }

    public function createChat(int $userId)
    {
        if (Auth::id() == $userId) {
            return redirect()->back();
        }

        $user = User::query()
            ->findOrFail($userId, ['name']);

        // Check for existing chats.
        $chat = Chat::query()
            ->where(function ($query) use ($userId) {
                return $query->where('from_user_id', Auth::id())
                    ->where('to_user_id', $userId);
            })
            ->orWhere(function ($query) use ($userId) {
                return $query->where('from_user_id', $userId)
                    ->where('to_user_id', Auth::id());
            })
            ->select('uuid')
            ->first();

        if (is_null($chat)) {
            Chat::query()
                ->create([
                    'uuid' => $chatUuid = Uuid::uuid4()->toString(),

                    'from_user_id' => Auth::id(),
                    'to_user_id' => $userId,

                    'name' => $user->name
                    ]);
        } else {
            $chatUuid = $chat->uuid;
        }

        // Get Messages.
        $messages = ChatMessage::query()
            ->whereHas('chat', function ($query) use ($chatUuid) {
                return $query->where('uuid', $chatUuid);
            })
            ->get();

        return view('chat', [
            'messages' => $messages,
            'chatId' => $chatUuid
        ]);
    }
}
