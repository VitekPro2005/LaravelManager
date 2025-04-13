@extends('layouts.main')

@section('categories')

    <h1>Категория: {{ $category->name }}</h1>

    @if ($posts->isNotEmpty())
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>В этой категории пока нет никаких постов.</p>
    @endif
    
@endsection
