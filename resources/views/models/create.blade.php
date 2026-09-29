@extends('layouts.app')

@section('title', 'Új autómodell')

@section('content')

<h1>Új autómodell</h1>

<form action="{{ route('models.store') }}" method="POST">


@csrf

<label for="name">Modell neve:</label>

<input
    type="text"
    id="name"
    name="name"
    value="{{ old('name') }}"
    required
>

<br>

<label for="brand_id">Márka:</label>

<select name="brand_id" id="brand_id" required>

    <option value="">-- Válassz márkát --</option>

    @foreach($brands as $brand)
        <option
            value="{{ $brand->id }}"
            @selected(old('brand_id', request('brand_id')) == $brand->id)
        >
            {{ $brand->name }}
        </option>
    @endforeach

</select>

<br>

<button type="submit">Mentés</button>
```

</form>

<a href="{{ route('models.index') }}">Vissza</a>

@endsection
