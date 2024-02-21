<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    public function index()
    {
        $siteInfo = SiteSetting::first();
        $news = News::where('status',1)->latest()->get();
        return view('frontend.pages.news', compact('news','siteInfo'));
    }
    public function newsDetails($id)
    {
        $siteInfo = SiteSetting::first();
        $newsDetails = News::find($id);
        return view('frontend.pages.newsDetails', compact('newsDetails','siteInfo'));
    }

}
