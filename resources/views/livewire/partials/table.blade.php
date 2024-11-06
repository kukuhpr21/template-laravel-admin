<div class="flex flex-col gap-2">

    @if ($buttonAdd)
        <a href="{{ $buttonAddLink }}" class="w-fit my-2 bg-slate-500 text-white rounded-lg p-3 hover:drop-shadow-lg hover:bg-slate-600 focus:outline-none focus:bg-slate-600 disabled:opacity-50 disabled:pointer-events-none">
            <i class="ri-add-line"></i>
            {{ $buttonAddtext }}
        </a>
    @endif

    <div class="-m-1.5 overflow-x-auto shadow-md rounded-lg">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-200">
                        <tr>
                            @if ($showIndex)
                                <th class="py-3">
                                    <div class="py-3 px-6 flex items-center cursor-pointer">
                                        #
                                    </div>
                                </th>
                            @endif
                            @foreach($this->columns() as $column)
                                <th wire:click="sort('{{ $column->key[0] }}')" class="py-3">
                                    <div class="py-3 px-6 flex items-center cursor-pointer">
                                    {{ $column->label }}
                                    <x-icon-sorting-table sortBy="{{ $sortBy }}" key="{{ $column->key[0] }}" sortDirection="{{ $sortDirection }}"/>
                                    </div>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach($this->data() as $row)
                            @php
                                $index++;
                            @endphp
                            <tr class="bg-white border-b hover:bg-gray-50">
                                @if ($showIndex)
                                    <td class="py-4">
                                        <div class="py-3 px-6 flex items-center cursor-pointer">
                                        {{ $index }}
                                        </div>
                                    </td>
                                @endif
                                @foreach($this->columns() as $column)
                                    <td class="py-4">
                                    <div class="py-3 px-6 flex items-center cursor-pointer">
                                        @php
                                            $val = '';

                                            if (count($column->key) > 1) {
                                                $data = [];
                                                foreach ($column->key as $key) {
                                                    array_push($data, $key);
                                                }
                                                $val = implode('.', $data);
                                            } else {
                                                $val = $row[$column->key[0]];
                                            }

                                        @endphp
                                        <x-dynamic-component
                                            :component="$column->component"
                                            :value="$val"
                                        >
                                        </x-dynamic-component>
                                    </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="p-2">
        {{ $this->data()->links('vendor.pagination.tailwind') }}
    </div>
  </div>
