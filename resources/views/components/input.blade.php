@props(['type', 'placeholder' => '', 'name'])
<input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ strtolower($name) }}"
    class="bg-gray-200 focus:bg-gray-300 py-4 px-3 my-3 rounded-2xl focus:outline-none focus:ring-0 border-0 ">
