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
    <div style="display: flex; gap: 1rem;">
        <section style="padding: 1rem; border: 2px solid black; border-radius: 1rem; min-width: 15rem;">
            <h2>Register as a User</h2>
            <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 0.5rem; ">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Register">
            </form>
        </section>
        <section style="padding: 1rem; border: 2px solid black; border-radius: 1rem; min-width: 15rem;">
            <h2>Log In with an Account</h2>
            <form action="/login" method="POST" style="display: flex; flex-direction: column; gap: 0.5rem; ">
                @csrf
                <input type="email" name="userEmail" placeholder="Email">
                <input type="password" name="userPassword" placeholder="Password">
                <input type="submit" value="Login">
            </form>
        </section>
    </div>
    @endauth
</body>
</html>