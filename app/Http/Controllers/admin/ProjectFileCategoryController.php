<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategorySection;
use App\Models\ProjectFileCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class ProjectFileCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('project-file-category-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $projectFileCategory =  ProjectFileCategory::latest()->get();
        return view('admin.pages.fileManagement.category.index',compact('projectFileCategory'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $projectFileCategory = new ProjectFileCategory();
            $projectFileCategory->name = $request->name;
            $projectFileCategory->save();
            Toastr::success('Project File Category Added Successfully', 'Success');
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
                'name' => 'required',
            ]);
            $projectFileCategory = ProjectFileCategory::find($id);
            $projectFileCategory->name = $request->name;
            $projectFileCategory->status = $request->status;
            $projectFileCategory->save();
            Toastr::success('Project File Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $projectFileCategory = ProjectFileCategory::find($id);
            $projectFileCategory->delete();
            Toastr::success('Project File Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
