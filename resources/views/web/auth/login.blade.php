@extends('web.layouts.auth')

@section('content')
    <div class="login_content">
        <div>
            <h2>Вход в кабинет</h2>
            <p>Общайтесь в чате с поддержкой,<br> первыми бронируйте номера в санаторий без переплат
            </p>
        </div>
        <div>
            <form action="{{route('web.auth.check')}}" method="post">
                @csrf
                <input type="text" name="phone">
                <button type="submit">Продолжить</button>
            </form>
            <span>
                Нажимая на кнопку я соглашаюсь с <a href="#">публичной офертой</a>
            </span>
        </div>
    </div>
@endsection
