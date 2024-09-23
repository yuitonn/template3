<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('posse_website'); // 'resources/views/posse?website.blade.php' を表示
    }
}
