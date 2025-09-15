<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Document' }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>This is a header</header>
    <main>
        {{ $slot }}
    </main>
    <footer>This is a footer</footer>
</body>

</html>
