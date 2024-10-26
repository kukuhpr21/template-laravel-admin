@props(['add'])

@section('css')
    @switch($add)
        @case('leaflet')
            <!-- Leaflet -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
            @break
        @default

    @endswitch
@endsection
