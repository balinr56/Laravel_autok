@extends('layouts.app')
@section('title', $model->name)
@section('content')
<div class="page-heading"><div><div class="eyebrow">Modellprofil · #{{ $model->id }}</div><h1 class="page-title">{{ $model->name }}</h1><p class="page-subtitle">Részletes modellnézet és kapcsolt gyártói információ.</p></div><div style="display:flex;gap:8px"><a href="{{ route('models.edit', $model) }}" class="btn">Szerkesztés</a><a href="{{ route('models.index') }}" class="btn">Vissza</a></div></div>
<div class="detail-grid">
<div class="card hero-card"><div class="big-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><path d="M5 16h14l-1.4-6H6.4L5 16Z"/><path d="M7 10 8.4 6h7.2L17 10"/><circle cx="8" cy="16" r="1"/><circle cx="16" cy="16" r="1"/></svg></div><h2>{{ $model->name }}</h2><p>Járműmodell · {{ $model->brand->name }}</p></div>
<div class="card detail-list"><div class="detail-row"><span>Rekordazonosító</span><span>#{{ str_pad($model->id, 3, '0', STR_PAD_LEFT) }}</span></div><div class="detail-row"><span>Márka</span><span>{{ $model->brand->name }}</span></div><div class="detail-row"><span>Státusz</span><span style="color:#86efac">● Aktív</span></div></div>
</div>
<div class="card" style="margin-top:14px;padding:22px"><div class="eyebrow">Gyorsműveletek</div><h2 style="margin:4px 0 15px;font-size:18px">Modell kezelése</h2><div style="display:flex;gap:8px;flex-wrap:wrap"><a href="{{ route('models.edit', $model) }}" class="btn btn-primary">Modell szerkesztése</a><a href="{{ route('brands.show', $model->brand) }}" class="btn">Márka megnyitása</a></div></div>
@endsection
