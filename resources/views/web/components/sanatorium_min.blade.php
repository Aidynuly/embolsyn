<a href="{{route('web.sanatorium.show',$sanatorium->id)}}" class="sanatorium_min">
    @if(count($sanatorium->image) > 0)
        <div class="bg_image" style="background-image: url({{asset($sanatorium->image[0]->path)}});"></div>
    @else
        <div class="bg_image" style="background-image: url({{asset('images/static/test_sanatorium.png')}});"></div>

    @endif
    <div class="sanatorium_content">
        <h4>{{$sanatorium->title}}</h4>
        <p>{{$sanatorium->description}}</p>
    </div>
</a>
