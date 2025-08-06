<div class="app-list">
    <table class="table-auto w-full border border-collapse border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">#</th>
                @foreach($columns as $key => $label)
                    <th class="border px-4 py-2">{{ $label }}</th>
                @endforeach
                @if (!empty($actions))
                    <th class="border px-4 py-2">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($items as $index => $item)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    @foreach($columns as $key => $label)
                        <td class="border px-4 py-2">
                            {{ data_get($item, $key) }}
                        </td>
                    @endforeach

                    @if (!empty($actions))
                        <td class="border px-4 py-2 space-x-2">
                            @foreach($actions as $action)
                                @if(strtolower($action['label']) === 'delete')
                                    <form action="{{ route($action['route'], $item->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-{{ $action['color'] ?? 'red' }}-600 hover:underline">
                                            {{ $action['label'] }}
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route($action['route'], $item->id) }}"
                                       class="text-{{ $action['color'] ?? 'blue' }}-600 hover:underline">
                                        {{ $action['label'] }}
                                    </a>
                                @endif
                            @endforeach
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 2 }}" class="border px-4 py-2 text-center">
                        No records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
