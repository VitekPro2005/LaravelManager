@extends('layouts.main')

@section('posts')

<h1>Блог</h1>
@auth
    @if (Auth::user()->is_manager)
    <a href="{{ route('posts.create') }}">Новый пост</a>
    @endif
@endauth
<a href="{{ route('posts.download') }}">Скачать все посты в JSON</a>
@foreach ($posts as $post)
    <a href="{{ route('posts.show', $post) }}"><h2>{{ $post->title }} :({{ $post->category->name }})</h2></a>

@endforeach
    {{ $posts->links() }}
@endsection
