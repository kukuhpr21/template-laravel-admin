<div class="relative">
    <!-- Search Input -->
    <input
        type="text"
        class="w-full border rounded p-2"
        placeholder="Search..."
        wire:model.debounce.300ms="searchSelect"
        wire:input='query()'
    />

    <!-- Dropdown -->
    @if (!empty($options))
        <ul class="absolute bg-white border w-full mt-1 rounded shadow">
            @foreach ($options as $option)
                <li
                    class="p-2 hover:bg-gray-100 cursor-pointer"
                    wire:click="selectOption({{ $option['id'] }})"
                >
                    {{ $option['name'] }}
                </li>
            @endforeach
        </ul>
    @endif

    <!-- Selected Option -->
    @if ($selectedOption)
        <div class="mt-2">
            <strong>Selected:</strong> {{ $selectedOption }}
        </div>
    @endif
</div>
