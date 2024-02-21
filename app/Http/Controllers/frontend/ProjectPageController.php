<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategorySection;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectPageController extends Controller
{
//    public function index(Request $request, $categoryWiseProject = 'all')
//    {
//        $projectCategory = ProjectCategorySection::all();
//        if($categoryWiseProject == 'all'){
//            $projects = Project::paginate(6);
//            foreach ($projects as $project) {
//                $categoryIds = json_decode($project->category_id);
//                if (is_array($categoryIds)) {
//                    $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name','name_bn','id')->toArray();
//                    $project->categories = $categories;
//                } else {
//                    $project->categories = [];
//                }
//            }
//        }else{
//           $projects = DB::table('projects')
//                    ->where('category_id', 'LIKE', "%$categoryWiseProject%")
//                    ->select('projects.*')
//                    ->get();
//                    foreach ($projects as $project) {
//                        $categoryIds = json_decode($project->category_id);
//                        if (is_array($categoryIds)) {
//                            $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name','name_bn','id')->toArray();
//                            $project->categories = $categories;
//                            //dd($project->categories);
//                        } else {
//                            $project->categories = [];
//                        }
//                    }
//        }
//        $projectLatest = Project::latest()->take(4)->get();
//        return view('frontend.pages.project', compact('projects', 'projectLatest', 'projectCategory'));
//    }
    public function index(Request $request, $categoryWiseProject = 'all')
    {
        $siteInfo = SiteSetting::first();
        $projectCategory = ProjectCategorySection::all();
        if ($request->has('title')) {
            $searchKeyword = $request->input('title');
            $projects = Project::where('title', 'LIKE', "%$searchKeyword%")
                ->orWhere('title_bn', 'LIKE', "%$searchKeyword%")
                ->paginate(6);
        } elseif ($categoryWiseProject == 'all') {
            $projects = Project::paginate(6);
        } else {
            $projects = Project::where('category_id', 'LIKE', "%$categoryWiseProject%")->paginate(6);
        }

        foreach ($projects as $project) {
            $categoryIds = json_decode($project->category_id);
            if (is_array($categoryIds)) {
                $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name','name_bn','id')->toArray();
                $project->categories = $categories;
            } else {
                $project->categories = [];
            }
        }

        $projectLatest = Project::latest()->take(4)->get();
        return view('frontend.pages.project', compact('projects', 'projectLatest', 'projectCategory', 'siteInfo'));
    }


    public function projectDetails($id)
    {
        $siteInfo = SiteSetting::first();
        $project = Project::where('id', $id)->first();
        if ($project) {
            $categoryIds = json_decode($project->category_id, true);
            if (is_array($categoryIds)) {
                $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name','name_bn')->toArray();
                $project->categories = $categories;
            } else {
                $project->categories = [];
            }
        } else {
            echo "Project not found";
        }
        $projectLatest = Project::latest()->take(4)->get();
        return view('frontend.pages.projectDetails',compact('project','projectLatest','siteInfo'));
    }
}
