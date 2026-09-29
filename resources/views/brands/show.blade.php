@extends('layouts.app')

@section('title', 'Márka')

@section('content')

<h1>{{ $brand->name }}</h1>

<p>ID: {{ $brand->id }}</p>

<h2>Modellek</h2>

<a href="{{ route('models.create', ['brand_id' => $brand->id]) }}">
    Új modell hozzáadása
</a>

<ul>
    @foreach($brand->models as $model)
        <li>
            {{ $model->name }}

```
        <a href="{{ route('models.edit', $model) }}">
            Szerkesztés
        </a>

        <form action="{{ route('models.destroy', $model) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">Törlés</button>
        </form>
    </li>
@endforeach
```

</ul>

<br>

<a href="{{ route('brands.edit', $brand) }}">
    Márka szerkesztése
</a>

<br>

<a href="{{ route('brands.index') }}">
    Vissza
</a>

@endsection
