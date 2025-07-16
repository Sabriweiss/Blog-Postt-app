<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Page</title>
</head>

<body>
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
</body>

</html>
