<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @if (!$note->trashed())
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="text-gray-700 text-sm mr-8">
                            <strong>Created:</strong> {{ $note->created_at->diffForHumans() }}
                        </span>
                        <span class="text-gray-700 text-sm">
                            <strong>Updated:</strong> {{ $note->updated_at->diffForHumans() }}
                        </span>
                    </div>
                    <div class="flex">
                        <a href="{{ route('notes.edit', $note) }}" class="btn-link text-xs">Edit Note</a>
                        <form method="post" action="{{ route('notes.destroy', $note) }}" class="ml-4">
                            @method('delete')
                            @csrf
                            <x-danger-button onclick="return confirm('Move this note to trash?')">
                                Move to trash
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex justify-between mb-2">
                    <div>
                        <span class="text-gray-700 text-sm">
                            <strong>Deleted:</strong> {{ $note->deleted_at->diffForHumans() }}
                        </span>
                    </div>
                    <div class="flex">
                        <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-4">
                            @method('patch')
                            @csrf
                            <x-secondary-button type="submit">
                                Restore
                            </x-secondary-button>
                        </form>
                        <form method="post" action="{{ route('trashed.destroy', $note) }}" class="ml-4">
                            @method('delete')
                            @csrf
                            <x-danger-button onclick="return confirm('Delete this note permanently?')">
                                Delete
                            </x-danger-button>
                        </form>
                    </div>
                </div>
            @endif
            <div class="mb-6 p-6 text-gray-900 bg-white border-b overflow-hidden shadow-sm sm:rounded-lg">
                <p class="whitespace-pre-wrap">{{ $note->details }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
