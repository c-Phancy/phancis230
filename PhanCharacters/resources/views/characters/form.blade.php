@php
    $birthday = explode("-", $character->birthday, 3)
@endphp

<div class="container-fluid p-3">
    <div class="row">
        <div class="col-12 py-1">
            <label class="form-label" for="name">Name</label>
            <input class="form-input" type="text" name="name" id="name" placeholder="Type Name"
                value="{{ $character->name ?? old('name') }}">
        </div>
        <div class="col-12 py-1">
            <label class="form-label" for="status">Status</label>
            <input class="form-input" type="text" name="status" placeholder="Type Status" id="status"
                value="{{ $character->status ?? old('status') }}">
        </div>
    </div>
    {{-- Input type date would be more sustainable (future-fix) --}}
    <fieldset class="row pb-3">
        <legend hidden>Birthday</legend>
        <div class="col-md-2 col-12">
            <label for="year">Birth Year</label>
            <select class="form-select" name="year" id="year-select">
                <option value="" hidden disabled
                    {{ old('year') == null ? 'selected' : '' }}>
                    Select Birth Year</option>
                @foreach(range(1901, date('Y')) as $yearOption)
                    <option value="{{ $yearOption }}"
                        {{ ($yearOption == (old('year') ?? ($birthday[2] ?? null))) ? 'selected' : '' }}>
                        {{ $yearOption }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 col-12">
            <label for="month">Birth Month</label>
            <select class="form-select"
                {{ !old('month') ? 'disabled' : '' }}
                name="month" id="month-select">
                <option value="" hidden disabled
                    {{ old('month') == null ? 'selected' : '' }}>
                    Select Birth Month</option>
                @foreach(range(1, 12) as $monthOption)
                    <option value="{{ $monthOption }}"
                        {{ ($monthOption == (old('month') ?? ($birthday[0] ?? null))) ? 'selected' : '' }}>
                        {{ $monthOption }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 col-12">
            <label for="day">Birth Day</label>
            <select class="form-select" @if (!old('day')) disabled @endif name="day" id="day-select">
                <option value="" disabled hidden
                    {{ old('day') == null ? 'selected' : '' }}>
                    Select Birth Day</option>
                @foreach(range(1, 31) as $dayOption)
                    <option value="{{ $dayOption }}"
                        {{ ($dayOption == (old('day') ?? ($birthday[1] ?? null))) ? 'selected' : '' }}>
                        {{ $dayOption }}</option>
                @endforeach
            </select>
        </div>
    </fieldset>
    <div class="row pb-3">
    <div id="occupation-parent-wrapper" class="col-12">
            <div id="occupation-wrapper" class="pb-2">
                <label id="descriptor" class="form-label" for="occupations">Occupation</label>
                {{-- imperfect space here after Remove click --}}
                <input class="form-input occupations" type="text" name="occupations" id="occupation-list"
                    placeholder="Type One Per Box"
                    value="{{ $character->occupation ?? old('occupations') }}">
            </div>
            <button type="button" class="btn form-button ms-4 ,y-1" id="add-occupation">Add Occupation</button>
            <button type="button" class="btn form-button ms-4 my-1" id="remove-occupation" disabled hidden>Remove
                Occupation</button>
        </div>
    </div>
    <div class="pb-5">
        <label class="form-label" for="img">Image</label>
        {{-- Cannot be repopulated --}}
        {{-- <input type="file" accept=".png, .jpeg, .jpg" name="img"> --}}
        <input class="form-input" type="text" name="img" placeholder="Image URL" id="image"
            value="{{ $character->img ?? old('img') }}">
    </div>
