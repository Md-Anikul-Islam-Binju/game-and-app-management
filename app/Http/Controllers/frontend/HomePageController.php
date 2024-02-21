<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Ott;
use App\Models\ProjectFile;
use App\Models\Showcase;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomePageController extends Controller
{
    public function index()
    {
        $teamMember = Team::where('status',1)->orderBy('order_no', 'ASC')->get();
        $training = Training::where('status',1)->get();
        $slider = Slider::all();
        $showcase = Showcase::where('status',1)->latest()->get();
        $counter =  Counter::all();
        $ott = Ott::where('status',1)->latest()->get();
        $totalTraining = Training::all()->count();
        $ottTotal = Ott::all()->count();
        $totalGame = ProjectFile::where('category_id',1)->count();
        $totalApp = ProjectFile::where('category_id',2)->count();
        return view('frontend.home', compact('teamMember', 'training', 'slider', 'showcase', 'counter',
        'totalTraining', 'ott', 'ottTotal', 'totalGame', 'totalApp'));
    }

    public function changeLocale(Request $request, $locale)
    {
        App::setLocale($locale);
        $request->session()->put('locale', $locale);
        return back();
    }
}
