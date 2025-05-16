<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

class HomeController extends Controller
{
    public function home()
    {
        $contents = Content::with('authors')->latest()->get();
        return view('home', compact('contents'));
    }
}
