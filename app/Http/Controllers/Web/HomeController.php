<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
}
