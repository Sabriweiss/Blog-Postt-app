<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" required>
        <textarea name="body" required>{{ $post->body }}</textarea>
        <button type="submit">Save Post</button>

    </form>

</body>

</html>
