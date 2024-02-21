<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategorySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('project-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $projectCategory = ProjectCategorySection::all();
        $projects = Project::latest()->get(); // Change the number to the desired limit

        foreach ($projects as $project) {
            $categoryIds = json_decode($project->category_id);
            if (is_array($categoryIds)) {
                $categories = ProjectCategorySection::whereIn('id', $categoryIds)->pluck('name')->toArray();
                $project->categories = $categories;
            } else {
                $project->categories = [];
            }
        }
        return view('admin.pages.resource.project.index', compact('projectCategory', 'projects'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/project'), $imageName);
            $project = new Project();
            $project->title = $request->title;
            $project->title_bn = $request->title_bn;
            $project->link = $request->link;
            $project->details = $request->details;
            $project->details_bn = $request->details_bn;
            $project->category_id = json_encode($request->category_id);
            $project->image = $imageName;
            $project->save();
            Toastr::success('Project Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $project = Project::find($id);
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/project'), $imageName);
                $project->image = $imageName;
            }
            $project->title = $request->title;
            $project->title_bn = $request->title_bn;
            $project->link = $request->link;
            $project->details = $request->details;
            $project->details_bn = $request->details_bn;
            $project->category_id = json_encode($request->category_id);

            $project->status = $request->status;
            $project->save();
            Toastr::success('Project Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::find($id);
            $imagePath = public_path('images/project/' . $project->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            // Delete the Team member
            $project->delete();
            Toastr::success('Project Delete Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
