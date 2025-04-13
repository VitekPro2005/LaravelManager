@extends('layouts.main')

@section('categories')
    <h1>Категории</h1>

    @auth
        @if (Auth::user()->is_manager)
            <a href="{{ route('categories.create') }}">Создать Новую Категорию</a>
        @endif
    @endauth

    <ul>
        @foreach ($categories as  $category)
            <li>
                <a href="{{ route('categories.show', $category) }}"><h2>{{ $category->name }}</h2></a>
                <php dd($category); php?>
                @auth
                    @if (Auth::user()->is_manager)
                        <a href="{{ route('categories.edit', $category) }}">Изменить</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>
@endsection
