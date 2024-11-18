<div>
    @php
        $lowerName = strtolower($name);
        $model = $form ? 'form.'.$lowerName : $lowerName;
    @endphp
    <select wire:click="query()" wire:model="{{$model}}" name="{{ $lowerName }}" class="searachble-select py-3 px-4 pe-9 block w-full bg-slate-50 focus:bg-slate-50 border border-slate-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
        @if ($selected)
            <option value="{{ $selected }}" selected>{{ $selectedName }}</option>
        @else
            <option value="" selected>{{ 'Pilih '.$name }}</option>
        @endif
    </select>
    @if ($showList)
        <div class="relative">
            <!-- Search Input -->
            <input
                type="text"
                class="w-full border rounded p-2"
                placeholder="Search..."
                wire:model="searchSelect"
                wire:keydown='query()'
                wire:input='query()'
            />

            <ul class="absolute bg-white border w-full mt-1 rounded shadow">
            @foreach($this->data() as $row)
                <li
                    class="p-2 hover:bg-gray-100 cursor-pointer"
                    wire:click="selectOption('{{ $row['id'] }}', '{{ $row['name'] }}')"
                >
                    {{ $row['name'] }}
                </li>
            @endforeach
            </ul>
        </div>
    @endif
</div>
