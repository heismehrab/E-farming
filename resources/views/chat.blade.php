<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farming Web Assistance</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

@if(isset($errorMessage))
    <script> alert("{{ $errorMessage }}") </script>
@endif

<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <a href="{{ url('/blog') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Blog</a>&nbsp;
            <a href="{{ url('/forum') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Forum</a>&nbsp;
            <a href="{{ url('/shop') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Shop</a>&nbsp;
            @auth
                <a href="{{ url('/chats') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Chats</a>&nbsp;
                <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
        <div class="chat_window">
            <div class="top_menu">
                <div class="title">Messages</div>
            </div>
            <ul class="messages" id="messages">
                @foreach($messages as $message)
                    <li class="message @if($message->from_user_id == \Illuminate\Support\Facades\Auth::id()) right @else left @endif appeared">
                        <div class="avatar"></div><div class="text_wrapper"><div class="text">{{ $message->message }} <br><br> {{ $message->created_at->toTimeString() }}</div></div>
                    </li>
                @endforeach()
            </ul>
            <div class="bottom_wrapper clearfix">
                <div class="message_input_wrapper">
                    <input class="message_input" id="message" placeholder="Type your message here..." />
                </div>
                <div class="send_message">
                    <div class="icon"></div>
                    <div class="text" onclick="sendMessage()">Send</div>
                </div>
            </div>
        </div>
        <div class="message_template">
            <li class="message">
                <div class="avatar"></div>
                <div class="text_wrapper">
                    <div class="text"></div>
                </div>
            </li>
        </div>
</div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function sendMessage() {
        var message = document.getElementById('message').value

        if (message === '' || message == null) {
            return;
        }

        $.ajax({
            type: "POST",
            url: "{{ route('store-chat') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                chatId: "{{ $chatId }}",
                fromUser: "{{ \Illuminate\Support\Facades\Auth::id() }}",
                message: message
            },
            success: function (data) {
                if (data.success == true) {
                    appendMessage(message)
                }
            }
        });
    }

    function appendMessage(message) {
        var time = (new Date());
        time = time.getHours() + ':' + time.getMinutes() + ':' + time.getSeconds();

        message = "<li class='message right appeared'>" +
            "<div class='avatar'></div><div class='text_wrapper'><div class='text'>" + message + '<br><br>' + time + "</li>"

        $("#messages").append(message);
    }
</script>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #edeff2;
        font-family: "Calibri", "Roboto", sans-serif;
    }

    .chat_window {
        position: absolute;
        width: calc(100% - 20px);
        max-width: 1500px;
        height: 800px;
        border-radius: 10px;
        background-color: #fff;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        background-color: #f8f8f8;
        overflow: hidden;
    }

    .top_menu {
        background-color: #fff;
        width: 100%;
        padding: 20px 0 15px;
        box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    }
    .top_menu .buttons {
        margin: 3px 0 0 20px;
        position: absolute;
    }
    .top_menu .buttons .button {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 10px;
        position: relative;
    }
    .top_menu .buttons .button.close {
        background-color: #f5886e;
    }
    .top_menu .buttons .button.minimize {
        background-color: #fdbf68;
    }
    .top_menu .buttons .button.maximize {
        background-color: #a3d063;
    }
    .top_menu .title {
        text-align: center;
        color: #bcbdc0;
        font-size: 20px;
    }

    .messages {
        position: relative;
        list-style: none;
        padding: 20px 10px 0 10px;
        margin: 0;
        height: 647px;
        overflow: scroll;
    }
    .messages .message {
        clear: both;
        overflow: hidden;
        margin-bottom: 20px;
        transition: all 0.5s linear;
        opacity: 0;
    }
    .messages .message.left .avatar {
        background-color: #f5886e;
        float: left;
    }
    .messages .message.left .text_wrapper {
        background-color: #ffe6cb;
        margin-left: 20px;
    }
    .messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
        right: 100%;
        border-right-color: #ffe6cb;
    }
    .messages .message.left .text {
        color: #c48843;
    }
    .messages .message.right .avatar {
        background-color: #fdbf68;
        float: right;
    }
    .messages .message.right .text_wrapper {
        background-color: #c7eafc;
        margin-right: 20px;
        float: right;
    }
    .messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
        left: 100%;
        border-left-color: #c7eafc;
    }
    .messages .message.right .text {
        color: #45829b;
    }
    .messages .message.appeared {
        opacity: 1;
    }
    .messages .message .avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: inline-block;
    }
    .messages .message .text_wrapper {
        display: inline-block;
        padding: 20px;
        border-radius: 6px;
        width: calc(100% - 85px);
        min-width: 100px;
        position: relative;
    }
    .messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
        top: 18px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }
    .messages .message .text_wrapper::after {
        border-width: 13px;
        margin-top: 0px;
    }
    .messages .message .text_wrapper::before {
        border-width: 15px;
        margin-top: -2px;
    }
    .messages .message .text_wrapper .text {
        font-size: 18px;
        font-weight: 300;
    }

    .bottom_wrapper {
        position: relative;
        width: 100%;
        background-color: #fff;
        padding: 20px 20px;
        position: absolute;
        bottom: 0;
    }
    .bottom_wrapper .message_input_wrapper {
        display: inline-block;
        height: 50px;
        border-radius: 25px;
        border: 1px solid #bcbdc0;
        width: calc(100% - 160px);
        position: relative;
        padding: 0 20px;
    }
    .bottom_wrapper .message_input_wrapper .message_input {
        border: none;
        height: 100%;
        box-sizing: border-box;
        width: calc(100% - 40px);
        position: absolute;
        outline-width: 0;
        color: gray;
    }
    .bottom_wrapper .send_message {
        width: 140px;
        height: 50px;
        display: inline-block;
        border-radius: 50px;
        background-color: #a3d063;
        border: 2px solid #a3d063;
        color: #fff;
        cursor: pointer;
        transition: all 0.2s linear;
        text-align: center;
        float: right;
    }
    .bottom_wrapper .send_message:hover {
        color: #a3d063;
        background-color: #fff;
    }
    .bottom_wrapper .send_message .text {
        font-size: 18px;
        font-weight: 300;
        display: inline-block;
        line-height: 48px;
    }

    .message_template {
        display: none;
    }
</style>
</html>
