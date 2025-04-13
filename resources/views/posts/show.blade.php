@extends('layouts.main')

@section('posts')

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    @if ($post->category)
        <p>Категория: {{ $post->category->name }}</p>
    @endif
    @auth
        @if (Auth::user()->is_manager)
            <p>
                <a href="{{ route('posts.edit', $post->id) }}">Изменить</a>
            </p>
        @endif
    @endauth
    </p>
    @auth
        @if (Auth::user()->is_admin)
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        @endif
    @endauth

@endsection
