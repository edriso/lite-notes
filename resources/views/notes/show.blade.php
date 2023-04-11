<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-2">
                <div>
                    <span class="text-gray-700 text-sm">
                        <strong>Created:</strong> {{ $note->created_at->diffForHumans() }}
                    </span>
                    <span class="text-gray-700 text-sm ml-8">
                        <strong>Update:</strong> {{ $note->updated_at->diffForHumans() }}
                    </span>
                </div>
                <div class="flex">
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link text-xs">Edit Note</a>
                    <form method="post" action="{{ route('notes.destroy', $note) }}" class="ml-4">
                        @method('delete')
                        @csrf
                        <x-danger-button onclick="return confirm('Delete This Note?')">Delete</x-danger-button>
                    </form>
                </div>
            </div>

            <div class="mb-6 p-6 text-gray-900 bg-white border-b overflow-hidden shadow-sm sm:rounded-lg">
                <p class="whitespace-pre-wrap">{{ $note->details }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
