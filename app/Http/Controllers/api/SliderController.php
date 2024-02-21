<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $slider = Slider::all();
            return response()->json(['slider' => $slider], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching slider data.'], 500);
        }
    }
}
