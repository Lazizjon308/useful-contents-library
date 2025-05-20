<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Edit Author') }}: {{ $author->name }}
            </h2>
            <a href="{{ route('authors.show', $author) }}" 
               class="inline-block px-5 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                ⬅️ Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('authors.update', $author) }}" method="POST" class="max-w-lg mx-auto">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <x-input-label for="name" :value="__('Author Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $author->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Update Author') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

