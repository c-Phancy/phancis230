@extends('layout')

@section('title', 'Update')

@section('css')
<link rel=stylesheet href={{ asset('css/form.css') }}>
@endsection

@section('content')
<header class="h1 text-center">Update a Character</header>
@if($errors->any())
<div class="toast show mx-3">
  <div class="toast-header d-flex justify-content-center">
      <div style="width: 90%;" class="h4 mb-0">Field Errors</div>
    <button type="button" style="width: 5%;" class="btn" id="toast-button" data-bs-dismiss="toast">X</button>
  </div>
  <div class="toast-body">
      <ul>
    @foreach($errors->all() as $error)
        @php
        $splitError = explode(" ", $error);
        @endphp
        <li>The <span class="font-weight-bold">{{ $splitError[1] }}</span> field is required.</li>
    @endforeach
      </ul>
</div>
</div>
@endif
<form method="POST" action="{{ route('characters.update', $character->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('characters/form')
    <div class="btn-group-vertical">
        <button type="submit" class="btn store-button" id="submit-button">Update Character</button>
        <a href="{{ route('characters.index') }}" class="btn store-button" type="button">Cancel</a>
    </div>
</div>
</form>
@endsection
@section('js')
<script src="{{ asset('js/form.js') }}"></script>
<script>
    document.getElementById('toast-button').addEventListener('click', function() {
        document.querySelectorAll('.toast')[0].classList.add('d-none');
    });
    </script>
@endsection