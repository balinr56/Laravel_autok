<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AutoVault') · AutoVault</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="glow-orb"></div>
<div class="app-shell">
    <aside class="sidebar">
        <a href="{{ url('/') }}" class="brand">
            <div class="brand-mark">
                <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.3">
                    <path d="M5 17h14l-1.5-7h-11L5 17Z"/><path d="M7 10 8.5 6h7L17 10M7 17v2M17 17v2M8 14h.01M16 14h.01"/>
                </svg>
            </div>
            <div class="brand-name">Auto<span>Vault</span></div>
        </a>

        <div class="nav-label">Munkaterület</div>
        <a href="{{ route('brands.index') }}" class="nav-item {{ request()->routeIs('brands.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M4 12h16M4 17h16"/><circle cx="8" cy="7" r="1.5"/><circle cx="16" cy="12" r="1.5"/><circle cx="10" cy="17" r="1.5"/></svg>
            Márkák
        </a>
        <a href="{{ route('models.index') }}" class="nav-item {{ request()->routeIs('models.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 16h14l-1.4-6H6.4L5 16Z"/><path d="M7 10 8.4 6h7.2L17 10M7 16v2M17 16v2"/><circle cx="8" cy="14" r="1"/><circle cx="16" cy="14" r="1"/></svg>
            Autómodellek
        </a>

        <div class="nav-label">Rendszer</div>
        <div class="nav-item" style="cursor:default;opacity:.65">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="8"/></svg>
            AI felület v2.0
        </div>

        <div class="sidebar-bottom">
            <div class="ai-card">
                <div class="tiny">✦ Intelligens réteg</div>
                <strong>Adatbázis online</strong>
                <p>Az AutoVault készen áll a következő autóadat feldolgozására.</p>
            </div>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <button class="btn icon-btn mobile-menu" type="button" aria-label="Oldalsáv megnyitása" aria-expanded="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
            <div></div>
            <div class="topbar-right">
                <div class="pill"><span class="status-dot"></span> Rendszer működik</div>
                <div class="avatar">AV</div>
            </div>
        </header>

        @if(session('status'))
            <div class="alert">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m5 12 4 4L19 6"/></svg>
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert" style="color:#fda4af;border-color:rgba(251,113,133,.18);background:rgba(251,113,133,.06)">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v5M12 17h.01"/><circle cx="12" cy="12" r="9"/></svg>
                Ellenőrizd a megadott adatokat.
            </div>
        @endif

        @yield('content')

        <footer>AutoVault · Laravel {{ app()->version() }} · PHP {{ PHP_VERSION }} · indokolatlan mennyiségű színátmenettel készült</footer>
    </main>
</div>
</body>
</html>
