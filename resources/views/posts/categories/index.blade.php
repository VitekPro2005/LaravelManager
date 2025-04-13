@extends('layouts.main')

@section('categories')

    <h1>Категории</h1>


    @foreach ($categories as  $category)
        <a href="{{ route('categories.show', $category->id) }}"><h2>{{ $category->name }}</h2></a>
    @endforeach

@endsection
