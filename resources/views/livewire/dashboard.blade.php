<!-- need for map -->
<x-add-css add="leaflet"/>
<x-add-js add="leaflet" :up="true"/>

<x-page title="Dashboard">
    <div class="flex flex-col gap-4">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 lg:gap-4 gap-6 lg:px-0 px-2">
            <x-card addclass="flex flex-col gap-3 bg-teal-100">
                <x-card-title>Total Penjualan</x-card-title>
                <x-card-value>100jt</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-white">
                <x-card-title>Total Pembeli</x-card-title>
                <x-card-value>50</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-white">
                <x-card-title>Total Barang</x-card-title>
                <x-card-value>70</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-white">
                <x-card-title>Keuntungan</x-card-title>
                <x-card-value>50jt</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
        </div>
        <div class="grid lg:grid-cols-2 sm:grid-cols-1 lg:gap-4 gap-6 lg:px-0 px-2">
            <x-card addclass="flex bg-blue-100">
                {!! $chart->container() !!}
            </x-card>
            <x-card-map id="map"/>
        </div>
    </div>
</x-page>
@push('scripts')
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
<script>
    let map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>
@endpush
