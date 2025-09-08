<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>
    <section style="padding: 1rem; border: 2px solid black; border-radius: 1rem; max-width: 20rem; max-height: min-content">
        <h2>Edit Post</h2>
        <form action="/edit-post/{{$post->id}}" method="POST" style="display: flex; flex-direction: column; gap: 0.5rem; ">
            @csrf
                @method('PUT')
            <input type="text" name="title" placeholder="Your Post Title" value="{{$post->title}}"/>
            <textarea name="body" placeholder="Your Post Content">{{$post->body}}</textarea>
            <input type="submit" value="Save Post"/>
        </form>
    </section>
</body>
</html>