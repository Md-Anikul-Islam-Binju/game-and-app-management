<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $about = About::latest()->get();
            return response()->json(['about' => $about], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
    }

}
