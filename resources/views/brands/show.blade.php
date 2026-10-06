@extends('layouts.app')
@section('title', $brand->name)
@section('content')
<div class="page-heading"><div><div class="eyebrow">Márkaprofil · #{{ $brand->id }}</div><h1 class="page-title">{{ $brand->name }}</h1><p class="page-subtitle">Gyártói entitás és hozzá tartozó modellkatalógus.</p></div><div style="display:flex;gap:8px"><a href="{{ route('brands.edit', $brand) }}" class="btn">Szerkesztés</a><a href="{{ route('brands.index') }}" class="btn">Vissza</a></div></div>
<div class="detail-grid">
<div class="card hero-card"><div class="big-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8"><path d="M5 17h14l-1.5-7h-11L5 17Z"/><path d="M7 10 8.5 6h7L17 10"/><circle cx="8" cy="17" r="1"/><circle cx="16" cy="17" r="1"/></svg></div><h2>{{ $brand->name }}</h2><p>Autógyártó · {{ $brand->models->count() }} kapcsolt modell</p></div>
<div class="card detail-list"><div class="detail-row"><span>Rekordazonosító</span><span>#{{ str_pad($brand->id, 3, '0', STR_PAD_LEFT) }}</span></div><div class="detail-row"><span>Státusz</span><span style="color:#86efac">● Aktív</span></div><div class="detail-row"><span>Modellek</span><span>{{ $brand->models->count() }} db</span></div></div>
</div>
<div class="card" style="margin-top:14px;padding:22px">
<div style="display:flex;align-items:center;justify-content:space-between;gap:10px"><div><div class="eyebrow">Kapcsolt adatok</div><h2 style="margin:4px 0 0;font-size:18px;letter-spacing:-.03em">Modellek</h2></div><a href="{{ route('models.create', ['brand_id' => $brand->id]) }}" class="btn btn-primary">+ Új modell</a></div>
<div class="model-list">
@forelse($brand->models as $model)
<div class="model-item"><div><div class="model-item-name">{{ $model->name }}</div><div class="entity-sub">Modell #{{ $model->id }}</div></div><div class="actions"><a href="{{ route('models.edit', $model) }}" class="btn">Szerkesztés</a><form action="{{ route('models.destroy', $model) }}" method="POST" data-confirm="Biztosan törlöd ezt a modellt?">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Törlés</button></form></div></div>
@empty <div class="empty"><div class="empty-icon">⌁</div><strong>Még nincs modell</strong><span>Adj hozzá egy modellt ehhez a márkához.</span></div>@endforelse
</div></div>
@endsection
