<form wire:submit="login" class="flex flex-col lg:w-1/4 w-full m-5 bg-white p-8 rounded-2xl drop-shadow-2xl shadow-white">
    <div class="flex justify-center w-full">
        <x-logo showDesc="false" />
    </div>
    <x-input type="email" name="Email" :form="true"/>
    <x-input type="password" name="Password" :form="true" placeholder=". . . . . ."/>
    <x-button type="submit" color="gray" size="lg" :full="true">Log In</x-button>
</form>
