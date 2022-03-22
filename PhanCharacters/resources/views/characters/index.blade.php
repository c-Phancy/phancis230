@extends('layout')

@section('css')
<link rel=stylesheet href={{ asset('css/index.css') }}>
@endsection

@section('content')
<header class="text-center h1 mt-5">Breaking Bad Characters</header>
@if (session()->get('success'))
<div id="toast-wrapper">
<div class="toast show mx-3">
  <div class="toast-header d-flex justify-content-center">
      <div style="width: 90%;" class="h4 mb-0">{{ session()->get('success') }}</div>
    <button type="button" style="width: 5%;" class="btn" id="toast-button" data-bs-dismiss="toast">X</button>
  </div>
</div>
</div>
@endif
<main class="text-nowrap">
    {{ $characters->links('vendor.pagination.paginator') }}
    <div class="table-responsive mb-4">
        <div class="table d-table" id="table">
            <div class="table-header d-table-row font-weight-bold">
                <div class="d-table-cell px-3 my-1">ID</div>
                <div class="d-table-cell px-3 my-1">Name</div>
                <div class="d-table-cell px-3 my-1">Status</div>
                <div class="d-table-cell px-3 my-1">Birthday</div>
                <div class="d-table-cell px-3 my-1"><a class="btn border-0 text-light" id="create-button" href="{{ route('characters.create' ) }}">Create</a></div>
            </div>
            @foreach($characters as $character)
                <div class="characters d-table-row">
                    <div class="d-table-cell px-3">{{ $character->id }}</div>
                    <div class="d-table-cell px-3"><a class="pointer character-name font-weight-bold"
                            href="{{ route('characters.show', $character->id) }}">{{ $character->name }}</a>
                    </div>
                    <div class="px-3 d-table-cell">{{ $character->status }}</div>
                    <div class="px-3 d-table-cell">{{ $character->birthday }}</div>
                    <div class="px-3 d-table-cell">
                        <form action="{{ route('characters.destroy', $character->id) }}"
                            method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
                            @csrf
                            @method('DELETE')
                            <a class="pointer form-button edit-button btn border-0 text-light" href="{{ route('characters.edit', $character->id) }}">Edit</a>
                            <button class="pointer form-button delete-button btn border-0 text-light"
                                type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- {{ $characters->links('pagination::bootstrap-5') }} --}}
    {{ $characters->links('vendor.pagination.results') }}
    {{ $characters->links('vendor.pagination.paginator') }}
</main>
@endsection
@section('js')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
</script>
<script src="{{ asset('js/index.js') }}"></script>
@endsection
