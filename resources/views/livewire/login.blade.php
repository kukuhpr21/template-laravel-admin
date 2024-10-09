<div class="flex h-screen w-screen items-center justify-center">
    <form wire:submite="login" class="flex flex-col w-1/4 bg-white p-8 rounded-2xl drop-shadow-md">
        @csrf
        <x-input-label type="text" name="Username" />
        <x-input-label type="password" name="Password" />
        <x-button type="submit" text="Log In" bgColor="red" />
    </form>
</div>
