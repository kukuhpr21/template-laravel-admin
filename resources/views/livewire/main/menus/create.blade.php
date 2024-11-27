<x-page title="Tambah Menu Baru" :back="true" routeBack="menus">
    <div class="flex flex-col sm:flex-row gap-3">
        <x-form width="w-full sm:w-1/2">
            <x-label name="Parent"/>
            <livewire:main.menus.searchable-select-parent name="Parent" :form="true"/>
            <x-input type="text" name="Name" :form="true"/>
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex flex-col w-full sm:w-1/2">
                    <x-input type="text" name="Link" :form="true" desc="Default value '#'"/>
                </div>
                <div class="flex flex-col w-full sm:w-1/2">
                    <x-input type="text" name="Link Alias" :form="true" desc="Default value '#'"/>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex flex-col w-full sm:w-1/2">
                    <x-input type="text" name="Icon" :form="true" desc="Default value '#'"/>
                </div>
                <div class="flex flex-col w-full sm:w-1/2">
                    <x-input type="number" name="Order" :form="true" desc="Default value '0'"/>
                </div>
            </div>
            <div class="flex w-full justify-end">
                <x-button type="submit" color="slate" size="md" :full="false">Submit</x-button>
            </div>
        </x-form>
        <div class="w-full sm:w-1/2">
            {!! $menus !!}
        </div>
    </div>
</x-page>
