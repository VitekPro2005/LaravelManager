@extends('layouts.main')

@section('posts.create')
    <h1>Блог</h1>
    <h2>Создать пост</h2>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label for="category">Категория:</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option @if ($category->id == old('category_id')) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>

        <label for="title">Название:</label>
        <input type="text" name="title" maxlength="32" value="{{ old('title') }}">
        @error('title')
        <div style="color:red">{{ $message }}</div>
        @enderror()

        <label for="content">Описание:</label>
        <input type="text" name="content" maxlength="255" value="{{ old('content') }}">
        @error('content')
        <div style="color:red">{{ $message }}</div>
        @enderror()

        <button type="submit">Отправить</button>
    </form>

@endsection
