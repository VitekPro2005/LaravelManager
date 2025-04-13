@extends('layouts.main')

@section('categories.edit')
    <h1>Изменение категории</h1>

    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
            @error('name')
            <div style="color:red">{{ $message }}</div>
            @enderror()
        </div>

        <button type="submit">Изменить категорию</button>
    </form>
@endsection