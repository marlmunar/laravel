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

   <div style="display: flex; gap: 2.5rem; margin-top: 1rem;">
    <section style="padding: 1rem; border: 2px solid black; border-radius: 1rem; min-width: 20rem; max-height: min-content">
        <h2>Create a Post</h2>
        <form action="/create-post" method="POST" style="display: flex; flex-direction: column; gap: 0.5rem; ">
            @csrf
            <input type="text" name="title" placeholder="Your Post Title"/>
            <textarea name="body" placeholder="Your Post Content"></textarea>
            <input type="submit" value="Save Post"/>
        </form>
    </section>
    <section style="flex: 1; padding-right: 2rem;">
        <h2>Your Posts</h2>
       @foreach ($posts as $post)
       <div style="background-color: #e6e6e6; border-radius: 0.5rem; padding: 0.5rem; margin: 0.5rem 0">
        <h3>{{$post->title}} by {{$post->author->name}}</h3>
        <p style="padding: 0 0.25rem;">{{$post->body}}</p>
        <div style="display: flex; gap:0.25rem;">
            <button><a href="/edit-post/{{$post->id}}" style="text-decoration: none; color: inherit;">Edit</a></button>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete"/>
            </form>
        </div>
       </div>
       @endforeach
    </section>
   </div>

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