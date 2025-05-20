<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Contents') }}
            </h2>
            <a href="{{ route('contents.create') }}"
               class="inline-block px-5 py-2 bg-gradient-to-r from-teal-500 to-blue-600 hover:from-teal-600 hover:to-blue-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                ➕ Create New Content
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Search and Filter Section -->
                    <div class="mb-6">
                        <form action="{{ route('contents.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <x-input-label for="search" :value="__('Search')" class="sr-only"/>
                                <x-text-input
                                    id="search"
                                    name="search"
                                    class="w-full"
                                    type="text"
                                    placeholder="Search by title or description..."
                                    :value="request('search')"
                                />
                            </div>
                            <div class="w-full md:w-48">
                                <x-input-label for="category" :value="__('Category')" class="sr-only"/>
                                <select
                                    id="category"
                                    name="category"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                >
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-48">
                                <x-input-label for="author" :value="__('Author')" class="sr-only"/>
                                <select
                                    id="author"
                                    name="author"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                >
                                    <option value="">All Authors</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-48">
                                <x-input-label for="genre" :value="__('Genre')" class="sr-only"/>
                                <select
                                    id="genre"
                                    name="genre"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                >
                                    <option value="">All Genres</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-primary-button type="submit">
                                    {{ __('Filter') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-500 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Content Grid -->
                    @if($contents->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($contents as $content)
                                <div class="bg-gradient-to-br from-white to-gray-100 dark:from-gray-800 dark:to-gray-900 border border-gray-200 dark:border-gray-700 shadow-xl rounded-2xl p-6 transition duration-300 hover:shadow-2xl hover:scale-105">
                                    <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">{{ $content->title }}</h3>
                                    <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">{{ Str::limit($content->description, 150) }}</p>
                                    
                                    <div class="space-y-2 mb-4">
                                        <div class="flex items-center text-sm">
                                            <span class="text-gray-500 dark:text-gray-400 mr-2">Author:</span>
                                            <a href="{{ route('authors.show', $content->author) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $content->author->name }}
                                            </a>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <span class="text-gray-500 dark:text-gray-400 mr-2">Category:</span>
                                            <a href="{{ route('categories.show', $content->category) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $content->category->name }}
                                            </a>
                                        </div>
                                        <div class="flex items-center text-sm">
                                            <span class="text-gray-500 dark:text-gray-400 mr-2">Genre:</span>
                                            <a href="{{ route('genres.show', $content->genre) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $content->genre->name }}
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <a href="{{ route('contents.show', $content) }}" 
                                           class="inline-block px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white text-sm font-medium rounded-lg shadow-md transition">
                                            👁 View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $contents->links() }}
                        </div>
                    @else
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-600 p-4 my-4">
                            <p class="text-yellow-700 dark:text-yellow-400">
                                No contents found. Please adjust your filters or create new content.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

