<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $character->name }}</title>
</head>
<body>
    <header>
        <h1>{{ $character->name }}</h1>
    </header>
    <footer>
        <a href="{{ route('characters.index') }}">All Characters</a>
    </footer>
</body>
</html>