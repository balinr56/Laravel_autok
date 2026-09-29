@extends('layouts.app')

@section('title', 'Autómodell szerkesztése')

@section('content')

<h1>Autómodell szerkesztése</h1>

<form action="{{ route('models.update', $model) }}" method="POST">

    @csrf
    @method('PUT')

    <label for="name">Modell neve:</label>

    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $model->name) }}"
        required
    >

    <br>

    <label for="brand_id">Márka:</label>

    <select name="brand_id" id="brand_id" required>

        @foreach($brands as $brand)
            <option
                value="{{ $brand->id }}"
                @selected(old('brand_id', $model->brand_id) == $brand->id)
            >
                {{ $brand->name }}
            </option>
        @endforeach

    </select>

    <br>

    <button type="submit">Mentés</button>

</form>

<a href="{{ route('models.index') }}">Vissza</a>

@endsection
