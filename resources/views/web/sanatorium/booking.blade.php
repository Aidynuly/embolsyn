@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="row">
        <div class="booking">
            <h2>Бронирование номера</h2>
            <div class="room">
                <div class="top">
                    <h3>{{$room->title}}</h3>
                    <p>{{$days}} ночей</p>
                    <p>{{$date_from}} {{ $date_from_month }} - {{$date_to}} {{$date_to_month}}</p>
                </div>
                <div class="count">
                    <p><img src="{{asset('images/static/parents.png')}}" > x{{$room->count_adults}}</p>
                    <p><img src="{{asset('images/static/children.png')}}" > x{{$room->count_children}}</p>
                </div>
                <h4>{{$room->sanatorium->title}}</h4>
            </div>

            <form action="{{route('web.sanatorium.booking')}}" method="post">
                @csrf
                <input type="hidden" name="room_id" value="{{$room->id}}">
                <input type="hidden" name="date_from" value="{{$date_from}}">
                <input type="hidden" name="date_to" value="{{$date_to}}">
                <div class="users">
                    <div class="row">
                        @for($i = 0; $i < $parent_count ; $i++)
                            @include('web.components.booking_user',['title'=>'Взрослый','index' =>$i,'type' => 'parent'])
                        @endfor
                        @for($i = 0; $i < $children_count ; $i++)
                            @include('web.components.booking_user',['title'=>'Детский','index' =>$i + $parent_count,'type' => 'children'])
                        @endfor

                    </div>
                </div>
                <button class="col-md-4" type="submit">К оплате</button>
            </form>
        </div>
    </div>
@endsection

