<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ $author->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('authors.edit', $author) }}" 
                   class="inline-block px-5 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                    ✏️ Edit
                </a>
                <a href="{{ route('authors.index') }}" 
                   class="inline-block px-5 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                    ⬅️ Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-4">Author Details</h3>
                        <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                            <p class="mb-2"><span class="font-bold">Name:</span> {{ $author->name }}</p>
                        </div>
                    </div>

                    @if($author->contents && $author->contents->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold mb-4">Content by {{ $author->name }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($author->contents as $content)
                                    <div class="bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4">
                                        <h4 class="font-bold text-lg mb-2">{{ $content->title }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($content->description, 100) }}</p>
                                        <a href="{{ route('contents.show', $content) }}" 
                                           class="text-blue-600 dark:text-blue-400 hover:underline">
                                            View Content
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mt-8">
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-600 p-4">
                                <p class="text-yellow-700 dark:text-yellow-400">No content associated with this author yet.</p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="mt-8">
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this author?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-5 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                                🗑️ Delete Author
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

