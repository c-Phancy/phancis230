<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Characters</title>
</head>
<body>
    <header>Characters</header>
    <main>
        @foreach ($characters as $character)
            <section>
                <figure>
                    <img src="{{$character->img}}" alt="{{$character->name}}">
                </figure>
                <h1>{{ $character->name }}</h1>
                <p>Status {{ $character->status }}</p>                    <p>Birthdate {{ $character->birthday }}</p>
                <h2>Occupation</h2>
                <ul>
                    <li>{{ $character->occupation }}</li>  
                </ul>  
            </section>
        @endforeach
    </main>
</body>
</html>