<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body style="padding: 0.5rem;">
    <h1>Home Page</h1>

    @auth
    <p>You are now logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>

    @else
    <section style="padding: 1rem; border: 2px solid black; border-radius: 1rem; max-width: 20rem;">
        <h2>Register as a User</h2>
        <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 0.5rem; ">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Register">
        </form>
    </section>
    @endauth
</body>
</html>