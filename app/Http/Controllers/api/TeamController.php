<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        try {
            $teams = Team::latest()->get();
            return response()->json(['teams' => $teams], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching team data.'], 500);
        }
    }
}
