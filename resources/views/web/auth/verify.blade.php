@extends('web.layouts.auth')

@section('content')
    <div class="login_content">
        <div>
            <h2>Введите код из SMS</h2>
            <p>На {{$phone}} отправлен SMS-код</p>
        </div>
        <div>
            <form action="{{route('web.auth.auth')}}" method="post">
                @csrf
                <input type="text" name="code" required>
                <button type="submit">Продолжить</button>
            </form>
        </div>
    </div>
@endsection
