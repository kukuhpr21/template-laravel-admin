<x-page title="Dashboard">
    <div class="flex flex-col gap-4">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 lg:gap-4 gap-6 lg:px-0 px-2">
            <x-card color="bg-teal-100">
                <x-card-title>Total Penjualan</x-card-title>
                <x-card-value>100jt</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card color="bg-gray-100">
                <x-card-title>Total Pembeli</x-card-title>
                <x-card-value>50</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card color="bg-gray-100">
                <x-card-title>Total Barang</x-card-title>
                <x-card-value>70</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
            <x-card color="bg-gray-100">
                <x-card-title>Keuntungan</x-card-title>
                <x-card-value>50jt</x-card-value>
                <x-card-description>description</x-card-description>
            </x-card>
        </div>
        <div class="grid lg:grid-cols-2 sm:grid-cols-1 lg:gap-4 gap-6 lg:px-0 px-2">
            <x-card color="bg-blue-100">
                <canvas id="myChart"></canvas>
            </x-card>
            <x-card-map id="map" description="Map using leaflet"/>
        </div>
    </div>
</x-page>
@push('scripts')
@vite(['resources/js/modules/dashboard.js'])
@endpush
