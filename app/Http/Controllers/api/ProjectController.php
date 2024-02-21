<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategorySection;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        try {
            $projects = Project::latest()->get();

            foreach ($projects as $project) {
                $categoryIds = json_decode($project->category_id);
                if (is_array($categoryIds)) {
                    $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name')->toArray();
                    $project->categories = $categories;
                } else {
                    $project->categories = [];
                }
            }
            return response()->json(['projects' => $projects], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching project data.'], 500);
        }
    }

}
