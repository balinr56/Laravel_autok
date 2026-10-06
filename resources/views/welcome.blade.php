@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card" style="position:relative;overflow:hidden;padding:clamp(28px,6vw,62px);min-height:390px;display:flex;align-items:center">
    <div style="position:absolute;inset:auto -100px -160px auto;width:380px;height:380px;border-radius:50%;background:linear-gradient(135deg,#8b5cf6,#22d3ee,#ec4899);filter:blur(85px);opacity:.18"></div>
    <div style="position:relative;max-width:720px">
        <div class="eyebrow">✦ AI-alapú autóipari adatréteg</div>
        <h1 style="margin:13px 0 0;font-size:clamp(44px,7vw,82px);line-height:.92;letter-spacing:-.075em;font-weight:900">
            Autóid.<br><span class="gradient-text">Rendszerezve.</span>
        </h1>
        <p style="max-width:560px;margin:22px 0 0;color:#8b93ac;font-size:14px;line-height:1.7">
            Üdv az AutoVaultban. Egy túlzottan elegáns, természetesen teljesen AI által tervezett kezelőfelület autómárkák és modellek kezelésére.
        </p>
        <div style="display:flex;gap:9px;flex-wrap:wrap;margin-top:25px">
            <a href="{{ route('brands.index') }}" class="btn btn-primary">Márkák felfedezése →</a>
            <a href="{{ route('models.index') }}" class="btn">Modellek megnyitása</a>
        </div>
        <div style="display:flex;gap:18px;margin-top:27px;color:#656d86;font-size:10px">
            <span>◉ Laravel háttérrendszer</span><span>◉ CRUD-kész</span><span>◉ 100%-ban indokolatlanul túldizájnolt</span>
        </div>
    </div>
</div>

<div class="stats" style="margin-top:14px">
    <div class="card stat"><div class="stat-label">1. modul</div><div class="stat-value" style="font-size:19px">Márkák</div><div class="stat-meta">Gyártói adatok kezelése</div></div>
    <div class="card stat"><div class="stat-label">2. modul</div><div class="stat-value" style="font-size:19px">Modellek</div><div class="stat-meta">Modellek és kapcsolatok</div></div>
    <div class="card stat"><div class="stat-label">Élmény</div><div class="stat-value" style="font-size:19px">Prémium</div><div class="stat-meta">Mert a CRUD-nak is lehet ragyogása</div></div>
</div>
@endsection
