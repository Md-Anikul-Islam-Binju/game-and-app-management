<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $news = News::latest()->get();
            return response()->json(['news' => $news], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching news.'], 500);
        }
    }

}
