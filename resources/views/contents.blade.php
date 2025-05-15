<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-dark-text leading-tight">
                {{ __('Contents') }}
            </h2>
            <a href="{{ route('contents.create') }}" class="btn btn-primary">
                {{ __('Create New Content') }}
            </a>
        </div>
    </x-slot>

    <div class="container py-4">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                @if(count($contents) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contents as $content)
                                    <tr>
                                        <td>{{ $content->title }}</td>
                                        <td>{{ Str::limit($content->description, 100) }}</td>
                                        <td>{{ $content->category->name ?? 'No Category' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('contents.show', $content) }}" class="btn btn-sm btn-info">
                                                    View
                                                </a>
                                                <a href="{{ route('contents.edit', $content) }}" class="btn btn-sm btn-warning">
                                                    Edit
                                                </a>
                                                <form action="{{ route('contents.destroy', $content) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning">
                        No contents found. Click the "Create New Content" button to add content.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

