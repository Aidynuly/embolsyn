<header class="{{$headerSize}}"  style="background-image: url({{asset('images/static/header_bg.png')}});">
    <div class="container">
        @include('web.components.header.header_up')
        @if($headerSize == 'full')
            <div class="bottom">
                <div><img src="{{asset('images/static/emblema.png')}}" alt=""></div>
                <form action="{{route('web.sanatorium.index')}}">
                    @csrf
                    <div>
                        <select name="city_id">
                            @foreach(\App\Models\City::all() as $city)
                                @if(Session::has('city_id'))
                                    @if(Session::get('city_id') == $city->id)
                                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endif
                                @else
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit">Искать санаторий</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</header>
