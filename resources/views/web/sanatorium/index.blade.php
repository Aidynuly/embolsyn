@extends('web.layouts.base')

@section('content')
    <div class="sanatoriums">
        <div class="top">
            <h2>Найдено {{count($sanatoriums)}} санаториев по Казахстану 🏩</h2>
            <form action="{{route('web.sanatorium.index')}}">
                <input type="search" placeholder="Введите название санатория" value="{{ old('search') }}"  name="search">
            </form>
        </div>

        <div class="list">
            @foreach($sanatoriums as $sanatorium)
                @include('web.components.sanatorium_min',['sanatorium' => $sanatorium])
            @endforeach
        </div>
    </div>
@endsection
