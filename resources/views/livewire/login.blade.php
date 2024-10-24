<form wire:submit="login" class="flex flex-col lg:w-1/4 w-full m-5 bg-white p-8 rounded-2xl drop-shadow-2xl shadow-white">
    <div class="flex justify-center w-full">
        <x-logo showDesc="false" />
    </div>
    <x-input-label type="text" name="Username" />
    @error('form.username')
        <x-invalid-input-form>{{$message}}</x-invalid-input-form>
    @enderror
    <x-input-label type="password" name="Password" />
    @error('form.password')
    <x-invalid-input-form>{{$message}}</x-invalid-input-form>
    @enderror
    <button type="submit" class="bg-teal-500 hover:bg-teal-700 text-white w-full text-lg font-medium rounded-2xl hover:shadow-xl my-3 p-5">Log In</button>
</form>
