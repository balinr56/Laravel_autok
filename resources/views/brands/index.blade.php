@extends('layouts.app')

@section('title', 'Márkák')

@section('content')

<h1>Márkák</h1>

<a href="{{ route('brands.create') }}">Új márka</a>

<form method="GET" action="{{ route('brands.index') }}">
    <input type="text" name="kereses" value="{{ $kereses }}" placeholder="Keresés...">
    <button type="submit">Keresés</button>

    @if($kereses)
        <a href="{{ route('brands.index') }}">Szűrés törlése</a>
    @endif
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Modellek</th>
            <th>Műveletek</th>
        </tr>
    </thead>

    <tbody>
        @forelse($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->models->pluck('name')->join(', ') }}</td>

                <td>
                    <a href="{{ route('brands.show', $brand) }}">Megtekintés</a>
                    <a href="{{ route('brands.edit', $brand) }}">Szerkesztés</a>

                    <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Nincs találat.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection