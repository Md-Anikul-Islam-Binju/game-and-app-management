<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
}
