<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $siteInfo = SiteSetting::first();
        $notice = Notice::where('status',1)->orderBy('published_date','desc')->paginate(10);
        return view('frontend.pages.notice', compact('notice','siteInfo'));
    }
}
