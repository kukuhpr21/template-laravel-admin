<div>
    <div class="relative overflow-x-auto shadow-md rounded-lg">
      <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
          <tr>
            @foreach($this->columns() as $column)
            <th wire:click="sort('{{ $column->key[0] }}')" class="py-3">
                <div class="py-3 px-6 flex items-center cursor-pointer">
                  {{ $column->label }}
                  @if($sortBy === $column->key[0])
                    @if ($sortDirection === 'asc')
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                           fill="currentColor">
                          <path fill-rule="evenodd"
                                d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"/>
                      </svg>
                    @else
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                           fill="currentColor">
                          <path fill-rule="evenodd"
                                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"/>
                      </svg>
                    @endif
                  @endif
                </div>
              </th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($this->data() as $row)
            <tr class="bg-white border-b hover:bg-gray-50">
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
    <div class="p-2">
        {{ $this->data()->links('vendor.pagination.tailwind') }}
    </div>
  </div>
