@extends('layouts.app')

@section('title', 'Márka szerkesztése')

@section('content')

<h1>Márka szerkesztése</h1>

<form action="{{ route('brands.update', $brand) }}" method="POST">

    @csrf
    @method('PUT')

    <label for="name">Márka neve:</label>

    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name', $brand->name) }}"
        required
    >

    <button type="submit">Mentés</button>

</form>

<a href="{{ route('brands.index') }}">Vissza</a>

@endsection