<x-page title="Tambah Role Baru" :back="true" routeBack="roles">
    <x-form width="w-full lg:w-1/2">
        <x-input-label type="text" name="Name"/>
        @error('name')
            <x-invalid-input-form>{{$message}}</x-invalid-input-form>
        @enderror
        <div class="flex w-full justify-end">
            <x-button type="submit" color="slate" size="md" :full="false">Submit</x-button>
        </div>
    </x-form>
</x-page>
