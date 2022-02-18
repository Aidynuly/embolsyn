@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="salePage">
        <h1> Сотрудничать с нами</h1>

        <div>
            {!! $setting->cooperate !!}
        </div>
    </div>
@endsection
