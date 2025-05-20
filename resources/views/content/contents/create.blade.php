<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Create New Content') }}
            </h2>
            <a href="{{ route('contents.index') }}" 
               class="inline-block px-5 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-semibold rounded-xl shadow-lg transition duration-300">
                ⬅️ Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left column -->
                            <div class="space-y-6">
                                <!-- Title -->
                                <div>
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <!-- Description -->
                                <div>
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea 
                                        id="description" 
                                        name="description" 
                                        rows="6" 
                                        class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm"
                                        required
                                    >{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- File Upload -->
                                <div>
                                    <x-input-label for="file" :value="__('Upload File')" />
                                    <input 
                                        type="file" 
                                        id="file" 
                                        name="file" 
                                        class="block w-full text-sm text-gray-900 dark:text-gray-300 mt-1
                                               file:mr-4 file:py-2 file:px-4
                                               file:rounded-md file:border-0
                                               file:text-sm file:font-medium
                                               file:bg-indigo-50 file:text-indigo-700
                                               dark:file:bg-indigo-900 dark:file:text-indigo-300
                                               hover:file:bg-indigo-100 dark:hover:file:bg-indigo-800
                                               hover:file:cursor-pointer"
                                    />
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Upload documents, PDFs, images or other files (max 10MB)</p>
                                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Right column -->
                            <div class="space-y-6">
                                <!-- Category -->
                                <div>
                                    <x-input-label for="category_id" :value="__('Category')" />
                                    <select
                                        id="category_id"
                                        name="category_id"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                        required
                                    >
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                </div>

                                <!-- Author -->
                                <div>
                                    <x-input-label for="author_id" :value="__('Author')" />
                                    <select
                                        id="author_id"
                                        name="author_id"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                        required
                                    >
                                        <option value="">Select Author</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                                                {{ $author->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                                </div>

                                <!-- Genre -->
                                <div>
                                    <x-input-label for="genre_id" :value="__('Genre')" />
                                    <select
                                        id="genre_id"
                                        name="genre_id"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                        required
                                    >
                                        <option value="">Select Genre</option>
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                                {{ $genre->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />
                                </div>

                                <!-- Additional Metadata -->
                                <div>
                                    <x-input-label for="publication_date" :value="__('Publication Date')" />
                                    <x-text-input id="publication_date" class="block mt-1 w-full" type="date" name="publication_date" :value="old('publication_date')" />
                                    <x-input-error :messages="$errors->get('publication_date')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="tags" :value="__('Tags (Separate with commas)')" />
                                    <x-text-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" placeholder="history, biography, science..." />
                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Preview section (if JavaScript preview functionality is implemented) -->
                        <div id="preview-section" class="hidden mt-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Preview</h3>
                            <div id="content-preview" class="p-4 bg-white dark:bg-gray-700 rounded border border-gray-200 dark:border-gray-600">
                                <!-- Preview content will be populated via JavaScript -->
                                <p class="text-gray-500 dark:text-gray-400">Fill out the form to see a preview</p>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button>
                                {{ __('Create Content') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

