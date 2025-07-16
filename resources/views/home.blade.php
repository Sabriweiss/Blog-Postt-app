<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Page</title>
</head>

<body>
    @auth
        <p>Welcome back, {{ auth()->user()->name }}!</p>
        <form action="/logout" method="post">
            @csrf
            <button>Log Out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Post a Blog</h2>
            <form action="/create-post" method="POST">
                @csrf
                <p>Please fill in the details to create a blog post:</p>
                <input name='title' type="text" placeholder="Enter the title of your blog" required>
                <textarea name='body' placeholder="Write your blog content here..." required></textarea>
                <button>Create Post</button>
            </form>

            <div style="border: 3px solid black;">
                <h2>Your Blog Posts</h2>
                @foreach ($posts as $post)
                    <div style="background: gray; margin: 10px; padding: 10px;">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->body }}</p>
                        <p><a href="edit-{{ $post->id }}">Edit</a></p>
                        <form action="/delete-post/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endforeach

            </div>
        @else
            <h1>Welcome to the Home Page</h1>
            <p>This is the home page of the blog post application.</p>
            <div style="border: 3px solid black;">
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <p>Please fill in the details to register:</p>
                    <input name='name' type="text" placeholder="Enter your name" required>
                    <input name= 'email' type="email" placeholder="Enter your email" required>
                    <input name='password' type="password" placeholder="Enter your password" required>
                    <button>Register</button>
                </form>
            </div>

            <div style="border: 3px solid black;">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <p>Please fill in the details to Login:</p>
                    <input name='loginname' type="text" placeholder="Enter your name" required>
                    <input name='loginpassword' type="password" placeholder="Enter your password" required>
                    <button>Login</button>
                </form>
            </div>
        @endauth



</body>

</html>
