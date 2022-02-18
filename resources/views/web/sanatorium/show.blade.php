@extends('web.layouts.base',['headerSize' => 'min'])

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div id="sanatoriumImageCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach([1,2,3,4,5] as $img)
                        <div class="carousel-item {{$loop->first ? 'active' :''}}">
                            <img src="{{asset('images/static/test_sanatorium.png')}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#sanatoriumImageCarousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#sanatoriumImageCarousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <h2>Немного про санаторий</h2>
            <p>{{$sanatorium->description}}</p>
        </div>
        <div class="col-lg-4 nameAddress">
            <h1>{{$sanatorium->title}}</h1>
            <p>{{$sanatorium->address}}</p>
            <h4>Номера</h4>
            <div class="sanatorium_rooms">
                @foreach($sanatorium->room as $room)
                    @include('web.components.room',['room' => $room])
                @endforeach
            </div>
        </div>
    </div>




    <div class="modal fade" id="reserveDate" tabindex="-1" aria-labelledby="reserveDate" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reserveDate">Дата выселения</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="">С</label>
                            <input required class="form-control" id="first_from_date" type="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>
                        <div class="col">
                            <label for="">по</label>
                            <input required class="form-control" id="first_to_date" type="date"  value="{{\Carbon\Carbon::now()->addDay()->format('Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="getDate()" class="btn btn-primary" data-bs-dismiss="modal"
                            data-bs-toggle="modal"
                            data-bs-target="#reserveCount">Готово
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reserveCount" tabindex="-1" aria-labelledby="reserveCount" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Сколько вас?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('web.sanatorium.bookingPage')}}">

                    <div class="modal-body">

                        <div>
                            <div class="name">Взрослые</div>
                            <div class="calk">
                                <button onclick="parentMinus()" class="minus" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </button>
                                <input type="text" name="parent_count" id="parent_count" value="1">
                                <button onclick="parentPlus()" class="plus" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <div class="name">Дети</div>
                            <div class="calk">
                                <button onclick="childrenMinus()" class="minus" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                </button>
                                <input type="text" name="children_count" id="children_count" value="0">
                                <button onclick="childrenPlus()" class="plus" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            {{--                        <div class="name">Младенцы</div>--}}
                            {{--                        <div class="calk">--}}
                            {{--                            <button onclick="babyMinus()" class="minus" type="button">--}}
                            {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">--}}
                            {{--                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>--}}
                            {{--                                </svg>--}}
                            {{--                            </button>--}}
                            {{--                            <input type="text" name="baby_count" id="baby_count" value="0">--}}
                            {{--                            <button onclick="babyPlus()" class="plus" type="button" >--}}
                            {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">--}}
                            {{--                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>--}}
                            {{--                                </svg>--}}
                            {{--                            </button>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="date_from" id="date_from">
                            <input type="hidden" name="date_to" id="date_to">
                            <input type="hidden" name="room_id" id="room_id">


                            <button type="submit" class="btn btn-primary">Готово</button>


                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
                let parentCount = 1;
                let childrenCount = 0;
                let babyCount = 0;


                function getDate() {
                    document.getElementById('date_from').value = document.getElementById('first_from_date').value
                    document.getElementById('date_to').value = document.getElementById('first_to_date').value
                }

                function getRoom(roomId) {
                    document.getElementById('room_id').value = roomId
                }

                function parentMinus() {
                    if (parentCount > 0) {
                        document.getElementById('parent_count').value = --parentCount;
                    }
                }

                function parentPlus() {
                    document.getElementById('parent_count').value = ++parentCount;

                }

                function childrenMinus() {
                    if (parentCount > 0) {
                        document.getElementById('children_count').value = --childrenCount;
                    }
                }

                function childrenPlus() {
                    document.getElementById('children_count').value = ++childrenCount;
                }

                function babyMinus() {
                    if (parentCount > 0) {
                        document.getElementById('baby_count').value = --babyCount;
                    }
                }

                function babyPlus() {
                    document.getElementById('baby_count').value = ++babyCount;

                }
    </script>
@endsection
