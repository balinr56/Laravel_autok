@extends('layouts.app')

@section('title', 'Autómodell')

@section('content')

<h1>{{ $model->name }}</h1>

<p>ID: {{ $model->id }}</p>

<p>Márka: {{ $model->brand->name }}</p>

<a href="{{ route('models.edit', $model) }}">
    Szerkesztés
</a>

<br>

<a href="{{ route('models.index') }}">
    Vissza
</a>

@endsection