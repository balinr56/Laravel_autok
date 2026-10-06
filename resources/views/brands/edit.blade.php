@extends('layouts.app')
@section('title', 'Márka szerkesztése')
@section('content')
<div class="page-heading"><div><div class="eyebrow">Márkaszerkesztő · #{{ $brand->id }}</div><h1 class="page-title"><span class="gradient-text">{{ $brand->name }}</span> szerkesztése</h1><p class="page-subtitle">Módosítsd a gyártó megjelenített nevét.</p></div></div>
<div class="card form-card">
<form action="{{ route('brands.update', $brand) }}" method="POST" class="form-grid">
@csrf @method('PUT')
<div class="field"><label for="name">Márka neve</label><input type="text" id="name" name="name" value="{{ old('name', $brand->name) }}" required autofocus>@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-actions"><a href="{{ route('brands.show', $brand) }}" class="btn">Mégse</a><button type="submit" class="btn btn-primary">Változtatások mentése</button></div>
</form>
</div>
@endsection
