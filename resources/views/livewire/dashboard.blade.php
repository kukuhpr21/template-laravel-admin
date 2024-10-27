<!-- need for map -->
<x-add-css add="leaflet"/>
<x-add-js add="leaflet"/>

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
                <canvas id="myChart" width="400" height="400"></canvas>
            </x-card>
            <x-card-map id="map"/>
        </div>
    </div>
</x-page>
@push('scripts')
@vite(['resources/js/modules/dashboard.js'])
@endpush
