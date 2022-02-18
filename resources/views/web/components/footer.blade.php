<footer>
    <div class="container">
        <div>
            <p>Наш адрес:</p>
            <h2>{{$contact->address}}</h2>
        </div>
        <div>
            <p>Мы в соц сетях:</p>
            <span>
                @if($contact->vk)
                    <a href="{{$contact->vk}}">
                        <img src="{{asset('images/static/vk.png')}}">
                    </a>
                @endif
                @if($contact->facebook)
                    <a href="{{$contact->facebook}}">
                        <img src="{{asset('images/static/facebook.png')}}">
                    </a>
                @endif
                @if($contact->instagram)
                    <a href="{{$contact->instagram}}">
                        <img src="{{asset('images/static/instagram.png')}}">
                    </a>
                @endif
                @if($contact->twitter)
                    <a href="{{$contact->twitter}}">
                        <img src="{{asset('images/static/twitter.png')}}">
                    </a>
                @endif
        </span>
        </div>
        <div>
            <p>Контакты:</p>
            <h2>{{$contact->phone}}</h2>
        </div>
    </div>
</footer>
