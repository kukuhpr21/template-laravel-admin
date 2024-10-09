<div class="flex h-screen w-screen items-center justify-center">
    <form wire:submite="login" class="flex flex-col w-1/4 bg-white p-8 rounded-xl drop-shadow-md">
        <x-input-label-form type="text" name="Username" />
        <x-input-label-form type="password" name="Password" />
    </form>
</div>
