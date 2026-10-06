@extends('layouts.app')

@section('title', 'Autómodellek')

@section('content')
<div class="page-heading">
    <div>
        <div class="eyebrow">Járműintelligencia</div>
        <h1 class="page-title">Autómodell <span class="gradient-text">adatbázis</span></h1>
        <p class="page-subtitle">Márkákhoz kapcsolt modellek, gyors kereséssel és CRUD kezeléssel.</p>
    </div>
    <a href="{{ route('models.create') }}" class="btn btn-primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Új modell
    </a>
</div>

<div class="stats">
    <div class="card stat"><div class="stat-label">Összes modell</div><div class="stat-value">{{ $models->count() }}</div><div class="stat-meta">Aktív rekord az adatbázisban</div></div>
    <div class="card stat"><div class="stat-label">Márkakapcsolatok</div><div class="stat-value">{{ $models->pluck('brand_id')->unique()->count() }}</div><div class="stat-meta">Használt autógyártók</div></div>
    <div class="card stat"><div class="stat-label">API-állapot</div><div class="stat-value" style="font-size:20px;color:#86efac">● SZINKRONIZÁLVA</div><div class="stat-meta">Lekérdezés sikeresen betöltve</div></div>
</div>

<div class="card toolbar">
    <form method="GET" action="{{ route('models.index') }}" class="search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
        <input type="text" name="kereses" value="{{ $kereses }}" placeholder="Keresés modell vagy márka alapján...">
    </form>
    @if($kereses)<a href="{{ route('models.index') }}" class="btn">Szűrés törlése</a>@endif
</div>

<div class="card table-wrap">
<table class="data-table">
    <thead><tr><th>ID</th><th>Modell</th><th>Márka</th><th style="text-align:right">Műveletek</th></tr></thead>
    <tbody>
    @forelse($models as $model)
        <tr>
            <td class="id">#{{ str_pad($model->id, 3, '0', STR_PAD_LEFT) }}</td>
            <td><div class="entity">
                <div class="entity-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 16h14l-1.4-6H6.4L5 16Z"/><path d="M7 10 8.4 6h7.2L17 10"/></svg></div>
                <div><div class="entity-name">{{ $model->name }}</div><div class="entity-sub">Járműmodell</div></div>
            </div></td>
            <td><span class="badge">{{ $model->brand->name }}</span></td>
            <td><div class="actions">
                <a href="{{ route('models.show', $model) }}" class="btn">Megnyitás</a>
                <a href="{{ route('models.edit', $model) }}" class="btn">Szerkesztés</a>
                <form action="{{ route('models.destroy', $model) }}" method="POST" data-confirm="Biztosan törlöd ezt a modellt?" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">Törlés</button>
                </form>
            </div></td>
        </tr>
    @empty
        <tr><td colspan="4" class="empty"><div class="empty-icon">⌁</div><strong>Nincs találat</strong><span>Próbálj meg egy másik keresőkifejezést.</span></td></tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
