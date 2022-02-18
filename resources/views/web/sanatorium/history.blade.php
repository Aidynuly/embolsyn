@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="profile_content">
        @include('web.components.profile_left_bar')
        <div class="col-7">
            <h2>История заказов</h2>
            <div class="history_orders">
                @foreach($bookings as $booking)
                    @include('web.components.history_order',['booking' => $booking])
                @endforeach
            </div>
        </div>
    </div>
@endsection
