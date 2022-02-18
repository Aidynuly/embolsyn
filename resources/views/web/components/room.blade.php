<div class="sanatorium_room">
    <div id="roomImageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach([1,2,3,4,5] as $img)
                <div class="carousel-item {{$loop->first ? 'active' :''}}">
                    <img src="{{asset('images/static/test_sanatorium.png')}}" class="d-block w-100" alt="...">
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#roomImageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#roomImageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <h5>{{$room->title}}</h5>
    <div class="info">
        <div class="count">
            <p><img src="{{asset('images/static/parents.png')}}" > x{{$room->count_adults}}</p>
            <p><img src="{{asset('images/static/children.png')}}" > x{{$room->count_children}}</p>
        </div>
        <h6 class="price"><span>за ночь</span> {{$room->price}} ₸</h6>
    </div>
    <p>{{$room->description}}</p>

    <div class="option">
        @foreach($room->comfort as $comfort)
            <div>
                <img src="{{$comfort->image}}" width="15">
                {{$comfort->name}}
            </div>
        @endforeach
    </div>

    <button type="button" onclick="getRoom({{$room->id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reserveDate">
        Бронировать за {{$room->price}} ₸
    </button>
</div>
