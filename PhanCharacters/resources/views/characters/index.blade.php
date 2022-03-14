@extends('layout')

@section('content')
<body>
    <header class="text-center h1 mt-5">Breaking Bad Characters</header>
    <main class="text-nowrap">
        <div class="table-responsive mt-5">
            <table class="table table-striped no-select">
                <tr scope="row">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Birthday</th>
                </tr>
                @foreach ($characters as $character)
                <tr class="characters">
                    <td>{{ $character->id }}</td>
                    <td><a class="character-name" href="{{ route('characters.show', $character->id) }}">{{ $character->name }}</a></td>
                    <td>{{ $character->status }}</td>
                    <td>{{ $character->birthday }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
        <script src=
     "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
   
@endsection
