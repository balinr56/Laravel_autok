@extends('layouts.app')

@section('title', 'Új márka')

@section('content')

<h1>Új márka</h1>

<form action="{{ route('brands.store') }}" method="POST">

    @csrf

    <label for="name">Márka neve:</label>

    <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name') }}"
        required
    >

    <button type="submit">Mentés</button>

</form>

<a href="{{ route('brands.index') }}">Vissza</a>

@endsection