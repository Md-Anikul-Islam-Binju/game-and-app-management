<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $siteInfo = SiteSetting::first();
        $teamMember = Team::where('status',1)->orderBy('order_no', 'ASC')->get();
        return view('frontend.pages.team', compact('teamMember','siteInfo'));
    }
}
