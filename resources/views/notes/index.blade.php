<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($notes as $note)
                <div class="mb-6 p-6 text-gray-900 bg-white border-b overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="text-xl font-bold">
                        <a href="{{ route('notes.show', $note) }}">{{ $note->title }}</a>
                    </h3>
                    <p class="py-2">{{ Str::limit($note->details, 150, '...') }}</p>
                    <span class="block text-sm text-gray-700">
                        {{ $note->updated_at->diffForHumans(['aUnit' => true]) }}
                    </span>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __('You have not taken notes yet!') }}
                    </div>
                </div>
            @endforelse

            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
