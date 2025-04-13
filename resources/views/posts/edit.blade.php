@extends('layouts.main')

@section('posts.edit')
    <h1>Изменить Пост</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="category">Категория:</label>
        <select name="category_id">
            @foreach ($categories as $category)
                <option {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="title">Название:</label>
        <input type="text" name="title" maxlength="32" value="{{ old('title') ?? $post->title }}">
        @error('title')
        <div style="color:red">{{ $message }}</div>
        @enderror

        <label for="content">Описание:</label>
        <input type="text" name="content" maxlength="255" value="{{ old('content') ?? $post->content }}">
        @error('content')
        <div style="color:red">{{ $message }}</div>
        @enderror()

        <button type="submit">Отправить</button>
    </form>

@endsection
