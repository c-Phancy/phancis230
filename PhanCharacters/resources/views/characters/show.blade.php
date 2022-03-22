@php
// $headers = get_headers($character->img);
// for testing purposes until non-image URLs are blocked
// $randomColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
@endphp

@extends('layout')

@section('title', $character->name)
@section('css')

{{-- @if (strpos($headers['Content-Type'], 'image/') !== false) --}}
<style>
    body {
        background: url({{ $character->img }}) center no-repeat;
        background-size: cover;
    }
</style>
{{-- @else
<style>
    body {
        background-color: {{ $randomColor }};
    }
</style> --}}
{{-- @endif --}}
<link rel="stylesheet" href="{{ asset('css/show.css') }}" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('content')
<main class="my-5 mx-auto">
    <div class="mx-0 mx-sm-4 pb-3">
        <h1 class="pt-5 px-3">{{ $character->name }}</h1>
        <p class="text-dark h3 font-weight-light font-italic mb-1">{{ $character->status }}</p>
        {{-- @if (strpos($headers['Content-Type'], 'image/') !== false) --}}
        <div id="image-modal" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="d-flex justify-content-end p-1">
                        <div>
                            <button id="modal-button" type="button"
                                class="border-0 bg-transparent d-flex justify-content-center align-items-center p-1"
                                data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="modal-header">
                        <div class="h1 modal-title mx-auto">{{ $character->name }}</div>
                    </div>
                    <div class="modal-body">
                        <img class="w-100" src="{{ $character->img }}" alt="{{ $character->name }}">
                    </div>
                </div>
            </div>
        </div>
        <figure class="py-3 mb-1">
            <button id="modal-button" type="button" class="btn w-50 p-0 border-none" data-bs-toggle="modal"
                data-bs-target="#image-modal">
                <img src="{{ $character->img }}" class="w-100" alt="{{ $character->name }}">
                <span id="tooltip">Click to expand</span>
            </button>
            <div id="image-instruction">Click to expand</div>
        </figure>
        {{-- @endif --}}
        <p class="h4 pb-3">Birthday<span
                class="h5 d-block font-italic font-weight-light pt-1">{{ $character->birthday }}</span></p>
        <p class="h4 pb-3 px-4">Occupation<span
                class="h5 d-block font-italic font-weight-light pt-1">{{ $character->occupation }}</span></p>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    const tooltip = document.getElementById('tooltip');
    window.onmousemove = function (e) {
        let x = e.clientX,
            y = e.clientY;
        tooltip.style.top = (y + 15) + 'px';
        tooltip.style.left = (x + 15) + 'px';
    }

</script>
@endsection
