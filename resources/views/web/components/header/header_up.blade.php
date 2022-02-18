
<div class="up">
    <div class="left">
        <img width="30" src="{{asset('images/static/logo.png')}}" alt="">
        <div>
            <a href="{{route('web.main.page')}}">Главная</a>
            <a href="{{route('web.sale.index')}}">Акции</a>
            <a href="{{route('web.contact')}}">Контакты</a>
            <a href="{{route('web.cooperate')}}">Сотрудничать с нами</a>
        </div>
    </div>

    <div class="right">
    @if(Auth::check())
            <a href="{{route('web.history')}}">{{Auth::user()->phone}}</a>
    @else
        <a href="{{route('web.auth.login')}}">Регистрация</a>
        <a href="{{route('web.auth.login')}}">Вход</a>
    @endif
    </div>

</div>
