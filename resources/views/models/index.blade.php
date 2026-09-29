@extends('layouts.app')

@section('title', 'Autómodellek')

@section('content')

<h1>Autómodellek</h1>

<a href="{{ route('models.create') }}">Új autómodell</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Modell</th>
            <th>Márka</th>
            <th>Műveletek</th>
        </tr>
    </thead>

    <tbody>
        @foreach($models as $model)
            <tr>
                <td>{{ $model->id }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->brand->name }}</td>

                <td>
                    <a href="{{ route('models.show', $model) }}">
                        Megtekintés
                    </a>

                    <a href="{{ route('models.edit', $model) }}">
                        Szerkesztés
                    </a>

                    <form action="{{ route('models.destroy', $model) }}" method="POST">
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