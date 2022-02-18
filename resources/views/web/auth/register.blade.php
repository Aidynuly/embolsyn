@extends('web.layouts.auth')

@section('content')
    <div class="login_content">
        <div>
            <h2>Вход в кабинет</h2>
            <p>Общайтесь в чате с поддержкой,<br> первыми бронируйте номера в санаторий без переплат
            </p>
        </div>
        <div>
            <input type="text">
            <button>Продолжить</button>
            <span>
                Нажимая на кнопку я соглашаюсь с <a href="#">публичной офертой</a>
            </span>
        </div>
    </div>
@endsection
