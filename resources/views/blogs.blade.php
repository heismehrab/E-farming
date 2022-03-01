<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farming Web Assistance</title>

    <!-- Fonts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">home</a>&nbsp;
            @auth()
                <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline" onclick="showPost()">New Post!</a>&nbsp;
            @endauth
            <a href="{{ url('/shop') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Shop</a>&nbsp;
            <a href="{{ url('/chats') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Chats</a>&nbsp;
            @auth
                <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
        <div class="cards">
            @foreach($posts as $key => $post)
                <a class="card">
                    <div class="card-hero">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdZYUSYDBdkKLAO5LevfeexdVDCpF4pHdqLoaAs-pXJSUx2QEpjmjxz9K2_Bx2mshyrd8&usqp=CAU"/>
                    </div>
                    <div class="card-header">
                        <h3>{{ $post->title }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->description }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="footer-item">
                            <img src="#" />
                        </div>
                        <div class="footer-item">
                            <strong onclick="postOption({{ $post->user->id }})">By {{ $post->user->name }} ,</strong>
                            <span class="muted">{{ $post->created_at->ago() }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h7 class="modal-title">New Post</h7>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="width: auto">
                        <label for="post-title">title:</label><br>
                        <input type="text" id="post-title"><br><br>

                        <label for="post-desc">description:</label><br>
                        <textarea id="post-desc"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="publishPost()">Post</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="modalOption" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h7 class="modal-title">Options</h7>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="width: auto">
                        <a href="{{ url('/chats-create') }}/{{ @$post->user->id }}">chat</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="modalOptionForDelete" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h7 class="modal-title">Options</h7>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="width: auto">
                        <a href="#" onclick="deletePost({{ @$post->id }})">delete</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
</div>
</body>

<script>
    $(window).on(function(){
        $('#myModal').modal('hide');
        $('#modalOption').modal('hide');
        $('#modalOptionForDelete').modal('hide');
    });

    function showPost() {
        $('#myModal').modal('show');
    }

    function postOption(userId) {

        if (userId == {{ \Illuminate\Support\Facades\Auth::id() ?: 0 }}) {
            $('#modalOptionForDelete').modal('show');
        } else {
            $('#modalOption').modal('show');
        }
    }

    function publishPost() {

        var title = $("#post-title").val();
        var description = $("#post-desc").val();

        if (title === '' || description === '') {
            alert('please fill title and description');

            return;
        }

        $.ajax({
            type: "POST",
            url: "{{ route('blog-store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                title: title,
                userId: "{{ \Illuminate\Support\Facades\Auth::id() }}",
                description: description
            },
            success: function (data) {
                if (data.success == true) {
                    location.reload();
                }
            }
        });
    }

    function deletePost(id) {

        if (! confirm('are you sure?')){
            return;
        }

        $.ajax({
            type: "DELETE",
            url: "{{ route('blog-delete') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            success: function (data) {
                if (data.success == true) {
                    location.reload();
                }
            }
        });
    }
</script>
<style>
    h1 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    h3 {
        text-transform: capitalize;
    }

    p {
        line-height: 1.5;
    }

    .cards {
        max-width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        column-gap: 2rem;
        row-gap: 2rem;
        grid-auto-flow: dense;
        align-items: start;
    }
    .card {
        margin: 0 auto;
        max-width: 320px;
        height: fit-content;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
    }

    0:hover {
         cursor: pointer;
         box-shadow: 0px 2px 16px rgba(0,0,0,0.2);
         transition: box-shadow 0.3s, transform 0.3s;
         transform: scale(1.05);

    .card-header {
    h3 {
        transition: color 0.3s;
        color: royalblue;
    }
    }
    }

    .card-hero {
    img {
        width: 100%;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    }

    .card-header {
        padding: 8px 16px;
    }

    .card-body {
        padding: 8px 16px;
    }

    .card-footer {
        padding: 8px 16px 16px 16px;
        display: flex;
        gap: 8px;
    .footer-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
    }
    .avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
    }
    }
    }
    }

    .muted {
        color: rgba(0,0,0,0.7);
    }

    @media only screen and (max-width: 1100px) {
        .cards {
        .card {
            max-width: 280px;
        }

    }
    }

    @media only screen and (max-width: 920px) {
        .cards {
            margin-top: 1rem;
            margin-bottom: 2rem;
            grid-template-columns: 1fr;
        .card {
            max-width: 400px;
        }

    }
    }

    @media only screen and (max-width: 500px) {
        .cards {
            margin-top: 1rem;
            margin-bottom: 2rem;
            grid-template-columns: 1fr;
        .card {
            max-width: 320px;
        }

    }
    }
</style>
</html>
