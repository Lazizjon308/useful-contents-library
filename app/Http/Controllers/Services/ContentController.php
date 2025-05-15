<?php

namespace App\Http\Controllers\Services;

use App\Models\Content;
use App\Http\Controllers\Web\Controller;

class ContentController extends Controller
{

    public static function index()
    {
        $contents = Content::with('category', 'authors', 'genres')->get();

        return $contents;
    }
}
