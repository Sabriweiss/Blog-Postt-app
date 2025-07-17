<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1 style="color: #e74c3c; text-align: center;">Unauthorized Access</h1>
    <p style="color: #e74c3c; text-align: center;">You do not have permission to view this page.</p>
    <form action="/error-page" method="POST">
        @csrf
        <button type="submit"><a href="/">Go to Home</a></button>
    </form>
</body>

</html>
