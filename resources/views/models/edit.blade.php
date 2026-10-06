@extends('layouts.app')
@section('title', 'Autómodell szerkesztése')
@section('content')
<div class="page-heading"><div><div class="eyebrow">Modellszerkesztő · #{{ $model->id }}</div><h1 class="page-title"><span class="gradient-text">{{ $model->name }}</span> szerkesztése</h1><p class="page-subtitle">Módosítsd a modell nevét vagy a hozzá tartozó márkát.</p></div></div>
<div class="card form-card"><form action="{{ route('models.update', $model) }}" method="POST" class="form-grid">
@csrf @method('PUT')
<div class="field"><label for="name">Modell neve</label><input type="text" id="name" name="name" value="{{ old('name', $model->name) }}" required autofocus>@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="brand_id">Márka</label><select name="brand_id" id="brand_id" required>@foreach($brands as $brand)<option value="{{ $brand->id }}" @selected(old('brand_id', $model->brand_id) == $brand->id)>{{ $brand->name }}</option>@endforeach</select>@error('brand_id')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-actions"><a href="{{ route('models.show', $model) }}" class="btn">Mégse</a><button type="submit" class="btn btn-primary">Változtatások mentése</button></div>
</form></div>
@endsection
