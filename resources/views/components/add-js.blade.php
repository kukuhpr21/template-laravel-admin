@props(['add', 'up' => true])


@switch($add)
    @case('leaflet')
        @if ($up)
            @section('js-up')
            <!-- Leaflet -->
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
            @endsection
         @else
            @push('scripts')
            <!-- Leaflet -->
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
            @endpush
        @endif
        @break
    @default

@endswitch
