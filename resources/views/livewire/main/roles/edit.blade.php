<x-page title="Edit Role" :back="true" routeBack="roles">
    <x-form width="w-full lg:w-1/2">
        <x-input type="text" name="Name"/>
        <div class="flex w-full justify-end">
            <x-button type="submit" color="slate" size="md" :full="false">Submit</x-button>
        </div>
    </x-form>
</x-page>
