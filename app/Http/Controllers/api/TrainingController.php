<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Venue;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $venues = Venue::all();
            $trainings = Training::latest()->get();
            foreach ($trainings as $training) {
                $venueIds = json_decode($training->venue_id);
                if (is_array($venueIds)) {
                    $categories = Venue::whereIn('id', $venueIds)->pluck('name')->toArray();
                    $training->venues = $categories;
                } else {
                    $training->venues = [];
                }
            }
            return response()->json(['venues' => $venues, 'trainings' => $trainings], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching training data.'], 500);
        }
    }
}
