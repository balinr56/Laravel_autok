@extends('layouts.app')
@section('title', 'Új autómodell')
@section('content')
<div class="page-heading"><div><div class="eyebrow">Modell létrehozása</div><h1 class="page-title">Új <span class="gradient-text">autómodell</span></h1><p class="page-subtitle">Kapcsold a modellt egy meglévő autómárkához.</p></div></div>
<div class="card form-card">
<form action="{{ route('models.store') }}" method="POST" class="form-grid">
@csrf
<div class="field"><label for="name">Modell neve</label><input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="pl. M3" required autofocus>@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label for="brand_id">Márka</label><select name="brand_id" id="brand_id" required><option value="">-- Válassz márkát --</option>@foreach($brands as $brand)<option value="{{ $brand->id }}" @selected(old('brand_id', request('brand_id')) == $brand->id)>{{ $brand->name }}</option>@endforeach</select>@error('brand_id')<div class="error">{{ $message }}</div>@enderror</div>
<div class="form-actions"><a href="{{ route('models.index') }}" class="btn">Mégse</a><button type="submit" class="btn btn-primary">Modell létrehozása</button></div>
</form></div>
@endsection
