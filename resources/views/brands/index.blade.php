@extends('layouts.app')

@section('title', 'Márkák')

@section('content')
<div class="page-heading">
    <div>
        <div class="eyebrow">Járműintelligencia</div>
        <h1 class="page-title">Márka <span class="gradient-text">könyvtár</span></h1>
        <p class="page-subtitle">Az összes elérhető autómárka egyetlen, kereshető adatnézetben.</p>
    </div>
    <a href="{{ route('brands.create') }}" class="btn btn-primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Új márka
    </a>
</div>

<div class="stats">
    <div class="card stat"><div class="stat-label">Összes márka</div><div class="stat-value">{{ $brands->count() }}</div><div class="stat-meta">Aktív rekord az adatbázisban</div></div>
    <div class="card stat"><div class="stat-label">Kapcsolt modellek</div><div class="stat-value">{{ $brands->sum(fn($brand) => $brand->models->count()) }}</div><div class="stat-meta">Márkákhoz rendelt modellek</div></div>
    <div class="card stat"><div class="stat-label">Adatállapot</div><div class="stat-value" style="font-size:20px;color:#86efac">● ÉLŐ</div><div class="stat-meta">Szinkronizáció rendben</div></div>
</div>

<div class="card toolbar">
    <form method="GET" action="{{ route('brands.index') }}" class="search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
        <input type="text" name="kereses" value="{{ $kereses }}" placeholder="Keresés márkanév vagy modell alapján...">
    </form>
    @if($kereses)
        <a href="{{ route('brands.index') }}" class="btn">Szűrés törlése</a>
    @endif
</div>

<div class="card table-wrap">
<table class="data-table">
    <thead><tr><th>ID</th><th>Márka</th><th>Modellek</th><th style="text-align:right">Műveletek</th></tr></thead>
    <tbody>
    @forelse($brands as $brand)
        <tr>
            <td class="id">#{{ str_pad($brand->id, 3, '0', STR_PAD_LEFT) }}</td>
            <td>
                <div class="entity">
                    <div class="entity-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 17h14l-1.5-7h-11L5 17Z"/><path d="M7 10 8.5 6h7L17 10"/></svg>
                    </div>
                    <div><div class="entity-name">{{ $brand->name }}</div><div class="entity-sub">Autógyártó</div></div>
                </div>
            </td>
            <td><span class="badge">{{ $brand->models->count() }} modell</span></td>
            <td>
                <div class="actions">
                    <a href="{{ route('brands.show', $brand) }}" class="btn">Megnyitás</a>
                    <a href="{{ route('brands.edit', $brand) }}" class="btn">Szerkesztés</a>
                    <form action="{{ route('brands.destroy', $brand) }}" method="POST" data-confirm="Biztosan törlöd ezt a márkát?" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit">Törlés</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="4" class="empty">
            <div class="empty-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg></div>
            <strong>Nincs találat</strong><span>Próbálj meg egy másik keresőkifejezést.</span>
        </td></tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
