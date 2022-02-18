<div class="populars">
    <h2>Популярные санаторий </h2>
    <div>
       @foreach($populars as $sanatorium)
            @include('web.components.sanatorium_min',['sanatorium' => $sanatorium])
        @endforeach
    </div>
</div>
