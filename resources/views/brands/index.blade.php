@extends('layouts.app')

@section('title', 'Márkák')

@section('content')

<h1>Márkák</h1>

<a href="{{ route('brands.create') }}">Új márka</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Műveletek</th>
        </tr>
    </thead>

    <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>

                <td>
                    <a href="{{ route('brands.show', $brand) }}">
                        Megtekintés
                    </a>

                    <a href="{{ route('brands.edit', $brand) }}">
                        Szerkesztés
                    </a>

                    <form action="{{ route('brands.destroy', $brand) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection