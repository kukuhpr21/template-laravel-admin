<x-page title="Daftar Role">
    {{-- <div>
        @foreach ($roles as $item)
            <span>{{ $item->name }}</span>
        @endforeach
    </div>

    {{ $roles->links() }} --}}
    @livewire('partials.table', [
        'columns' => $columns,
        'data' => $data
    ])

</x-page>
