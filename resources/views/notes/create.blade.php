<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        <x-text-input type="text" name="title" class="w-full mb-4" placeholder="Title" />

                        <x-textarea name="discription" class="w-full mb-4" cols="30" rows="10"
                            placeholder="Start typing here...">
                        </x-textarea>

                        <x-primary-button class="w-full justify-center">Save Note</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
