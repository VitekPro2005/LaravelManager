@auth
<p>
    Вы вошли как: {{ Auth::user()->name }} ({{ Auth::user()->email }})
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Выйти</button>
    </form>
</p>
@endauth
@guest
    <form action="{{ route('login.without.redirect') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Войти</button>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div style="color:red">{{ $error }}</div>
            @endforeach
        @endif
    </form>
@endguest
