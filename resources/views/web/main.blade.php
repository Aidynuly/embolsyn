@extends('web.layouts.base')

@section('content')
    @include('web.components.popular_sanatorium.index',['populars' => $populars])
    @include('web.components.profitable_offers.index',['profitable_offers' => $profitable_offers])
@endsection
