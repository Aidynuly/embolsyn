<div class="profitable_offers">
    <h2>Выгодные предложения 🎁</h2>
    <div>
        @foreach($profitable_offers as $sanatorium)
            @include('web.components.sanatorium_min',['sanatorium' => $sanatorium])
        @endforeach
    </div>
</div>
