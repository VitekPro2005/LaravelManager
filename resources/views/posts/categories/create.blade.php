@extends('layouts.main')

@section('categories.create')
    <h1>Создание новой категории</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div>
            <label for="name">Название: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
            <div style="color:red">{{ $message }}</div>
            @enderror()
        </div>

        <button type="submit">Создать категорию</button>
    </form>
@endsection