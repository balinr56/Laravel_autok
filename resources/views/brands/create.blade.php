@extends('layouts.app')
@section('title', 'Új márka')
@section('content')
<div class="page-heading"><div><div class="eyebrow">Márka létrehozása</div><h1 class="page-title">Új <span class="gradient-text">márka</span></h1><p class="page-subtitle">Hozz létre egy új gyártót az AutoVault rendszerében.</p></div></div>
<div class="card form-card">
<form action="{{ route('brands.store') }}" method="POST" class="form-grid">
@csrf
<div class="field">
<label for="name">Márka neve</label>
<input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="pl. BMW" required autofocus>
<div class="field-hint">A márkanév az adatbázisban egyedi entitásként jelenik meg.</div>
@error('name')<div class="error">{{ $message }}</div>@enderror
</div>
<div class="form-actions"><a href="{{ route('brands.index') }}" class="btn">Mégse</a><button type="submit" class="btn btn-primary">Márka létrehozása</button></div>
</form>
</div>
@endsection
