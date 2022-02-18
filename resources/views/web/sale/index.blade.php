@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="row salePage">
        <h1>Акции</h1>
        <div class="sales">
            @foreach($sales as $sale)
                <a href="{{route('web.sale.show',$sale->id)}}">
                    <div class="avatar" style="background-image: url({{asset($sale->image)}});"></div>
                    <div class="right">
                        <h2>{{$sale->title}}</h2>
                        <p>{{$sale->sub_title}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

