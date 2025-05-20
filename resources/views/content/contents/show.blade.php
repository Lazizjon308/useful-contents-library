<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ $content->title }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('contents.edit', $content) }}" 
                   class="inline-block px-5 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                    ✏️ Edit
                </a>
                <a href="{{ route('contents.index') }}" 
                   class="inline-block px-5 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                    ⬅️ Back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Section -->
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Content Details -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Title and Description -->
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $content->title }}</h1>
                                <div class="prose dark:prose-invert max-w-none">
                                    <p>{{ $content->description }}</p>
                                </div>
                            </div>

                            <!-- File Preview/Download -->
                            @if($content->file_path)
                                <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                    <h3 class="text-lg font-semibold mb-3">File Attachment</h3>
                                    
                                    @php
                                        $fileExtension = pathinfo($content->file_path, PATHINFO_EXTENSION);
                                    @endphp
                                    
                                    <div class="flex items-center">
                                        <span class="mr-3">
                                            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            @elseif(in_array($fileExtension, ['pdf']))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                            @elseif(in_array($fileExtension, ['doc', 'docx']))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            @endif
                                        </span>
                                        
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ basename($content->file_path) }}
                                            </p>
                                            <a href="{{ asset('storage/' . $content->file_path) }}" 
                                               class="text-indigo-600 dark:text-indigo-400 hover:underline text-sm" 
                                               download>
                                                Download File
                                            </a>
                                        </div>
                                    </div>
                                    
                                    @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <div class="mt-4">
                                            <img src="{{ asset('storage/' . $content->file_path) }}" 
                                                 alt="Content image" 
                                                 class="rounded-lg max-h-60 object-contain" />
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        
                        <!-- Metadata -->
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-xl p-5 shadow">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Content Information</h3>
                                
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Author</p>
                                        <a href="{{ route('authors.show', $content->author) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                            {{ $content->author->name }}
                                        </a>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Category</p>
                                        <a href="{{ route('categories.show', $content->category) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                            {{ $content->category->name }}
                                        </a>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Genre</p>
                                        <a href="{{ route('genres.show', $content->genre) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                            {{ $content->genre->name }}
                                        </a>
                                    </div>
                                    
                                    @if($content->publication_date)
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Publication Date</p>
                                            <p>{{ \Carbon\Carbon::parse($content->publication_date)->format('F j, Y') }}</p>
                                        </div>
                                    @endif
                                    
                                    @if($content->tags)
                                        <div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Tags</p>
                                            <div class="flex flex-wrap gap-2 mt-1">
                                                @foreach(explode(',', $content->tags) as $tag)
                                                    <span class="px-2 py-1 text-xs rounded-md bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200">
                                                        {{ trim($tag) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Created</p>
                                        <p>{{ $content->created_at->format('F j, Y, g:i a') }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Last Updated</p>
                                        <p>{{ $content->updated_at->format('F j, Y, g:i a') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Delete Form -->
                            <div>
                                <form action="{{ route('contents.destroy', $content) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-5 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                                        🗑️ Delete Content
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Related Content Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- By Same Author -->
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">More by {{ $content->author->name }}</h3>
                        
                        @if($authorContents->count() > 0)
                            <div class="space-y-4">
                                @foreach($authorContents as $authorContent)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb-3 last:border-b-0 last:pb-0">
                                        <a href="{{ route('contents.show', $authorContent) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                                            {{ $authorContent->title }}
                                        </a>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            {{ Str::limit($authorContent->description, 60) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">No related content by this author.</p>
                        @endif
                    </div>
                </div>
                
                <!-- Same Category -->
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Similar in {{ $content->category->name }}</h3>
                        
                        @if($categoryContents->count() > 0)
                            <div class="space-y-4">
                                @foreach($categoryContents as $categoryContent)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb-3 last:border-b-0 last:pb-0">
                                        <a href="{{ route('contents.show', $categoryContent) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline font-medium">
                                            {{ $categoryContent->title }}
                                        </a>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            {{ Str::limit($categoryContent->description, 60) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 dark:text-gray-400">No related content in this category.</p>
                        @endif
                    </div>
                </div>
                
                <!-- Same Genre -->
                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Also in {{ $content->genre->name }}</h3>
                        
                        @if($genreContents->count() > 0)
                            <div class="space-y-4">
                                @foreach($genreContents as $genreContent)
                                    <div class="border-b border-gray-200 dark:border-gray-700 pb

