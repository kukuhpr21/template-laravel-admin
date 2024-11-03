@props(['propName'])
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">{{ $column }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($data as $row)
                    <tr>
                        @foreach ($columns as $column)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ $row[$column] ?? '' }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
