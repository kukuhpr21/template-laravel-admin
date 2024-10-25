<x-page title="Dashboard">
    <div class="flex flex-col">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 lg:gap-2 gap-4 lg:px-0 px-2">
            <x-card addclass="flex flex-col gap-3 bg-teal-50">
                <x-card-title>Total Penjualan</x-card-title>
                <x-card-description>100jt</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-blue-50">
                <x-card-title>Total Pembeli</x-card-title>
                <x-card-description>50</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-yellow-50">
                <x-card-title>Total Barang</x-card-title>
                <x-card-description>70</x-card-description>
            </x-card>
            <x-card addclass="flex flex-col gap-3 bg-red-50">
                <x-card-title>Keuntungan</x-card-title>
                <x-card-description>50jt</x-card-description>
            </x-card>
        </div>
    </div>
</x-page>
