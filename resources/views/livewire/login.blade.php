<div class="flex h-screen w-screen items-center justify-center">
    <form wire:submit="login" class="flex flex-col lg:w-1/4 w-full m-5 bg-white p-8 rounded-2xl drop-shadow-md">
        <div class="flex justify-center w-full">
            <x-logo showDesc="false" />
        </div>
        <x-input-label wire:model='form.username' type="text" name="Username" />
        @error('form.username')
            <x-invalid-input-form>{{$message}}</x-invalid-input-form>
        @enderror
        <x-input-label wire:model='form.password' type="password" name="Password" />
        @error('form.password')
        <x-invalid-input-form>{{$message}}</x-invalid-input-form>
        @enderror
        <x-button type="submit" :full="true">Log In</x-button>
    </form>
</div>
