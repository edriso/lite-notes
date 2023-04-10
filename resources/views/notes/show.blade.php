<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex mb-2">
                <p class="text-gray-700 text-sm"><strong>Created:</strong> {{ $note->created_at->diffForHumans() }}</p>
                <p class="text-gray-700 text-sm ml-8"><strong>Update:</strong> {{ $note->updated_at->diffForHumans() }}
                </p>
            </div>

            <div class="mb-6 p-6 text-gray-900 bg-white border-b overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <h3 class="text-4xl font-bold">
                    {{ $note->title }}
                </h3> --}}
                <p class="whitespace-pre-wrap">{{ $note->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
