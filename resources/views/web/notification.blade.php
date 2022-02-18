@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="profile_content">
        @include('web.components.profile_left_bar')
        <div class="col-7">
            <h2>Уведомления</h2>
            <div class="notifications">

                @foreach($notifications as $notification)
                    <div>
                        @if(count($notification->sanatorium->image) > 0)
                            <div class="avatar" style="background-image: url({{asset($notification->sanatorium->image[0]->path)}});"></div>
                        @else
                            <div class="avatar" style="background-image: url({{asset('images/static/test_sanatorium.png')}});"></div>
                        @endif
                        <div>
                            <h2>{{$notification->sanatorium->title}}</h2>
                            <h4>{{$notification->description}}</h4>
                            <p>Успейте забронировать номер отеля на берегу озера Боровое до 12%(зависит от номера)</p>
                            <h6>{{ \Carbon\Carbon::parse($notification->created_at)->format('h:i') }}, {{ \Carbon\Carbon::parse($notification->created_at)->format('d') }} {{ \Carbon\Carbon::parse($notification->created_at)->monthName }}</h6>
                        </div>
                    </div>
                    <hr>
                @endforeach


            </div>
        </div>
    </div>
@endsection
