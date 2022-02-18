@extends('web.layouts.base')

@section('content')
    <div class="salePage">

        <h1>{{$sale->title}}</h1>

        <div class="saleView">
            {!! $sale->description !!}
        </div>
    </div>
@endsection
