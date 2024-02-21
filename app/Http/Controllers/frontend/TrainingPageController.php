<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingPageController extends Controller
{
    public function index()
    {
        $siteInfo = SiteSetting::first();
        $training = Training::where('status',1)->latest()->get();
        return view('frontend.pages.training', compact('training','siteInfo'));
    }
}
