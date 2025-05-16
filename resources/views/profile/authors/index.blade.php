@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #0f172a; /* fon rangi */
        }

        .author-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .author-card {
            background-color: #1e293b; /* kartochka rangi */
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: transform 0.2s ease;
        }

        .author-card:hover {
            transform: translateY(-4px);
        }

        .btn-show {
            background-color: #6366f1;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-show:hover {
            background-color: #4f46e5;
        }

        .admin-header {
            background-color: #0f172a;
            padding: 20px;
            color: #fff;
        }

        .admin-header h2 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>

    <div class="container py-5">
        <div class="admin-header">
            <h2>Authors</h2>
        </div>

        <h1>salom</h1>
        <div class="author-grid">
            @foreach($authors as $author)
                <div class="author-card">
                    <h5>{{ $author->name }}</h5>
                    <a href="{{ route('authors.show', $author->id) }}" class="btn-show">Show</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
