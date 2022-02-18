@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="profile_content row">
        @include('web.components.profile_left_bar')
        <div class="col-7 contact">
            <h2>Контакты</h2>

            <div class="top">
                <div class="avatar" style="background-image: url({{asset('images/static/test_sanatorium.png')}});"></div>
                <div>
                    <h4>{{$contact->name}}</h4>
                    <h6>{{$contact->sub_title}}</h6>
                    <div class="social">
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
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>
                    <span>Телефон</span>
                    <span>{{$contact->phone}}</span>
                </p>
                <p>
                    <span>Адрес</span>
                    <span>{{$contact->address}}</span>
                </p>
                <p>
                    <span>Веб сайт</span>
                    <span>{{$contact->website}}</span>
                </p>
                <p>
                    <span>Почта</span>
                    <span>{{$contact->email}}</span>
                </p>

            </div>
        </div>
    </div>
@endsection
