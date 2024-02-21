<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategorySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class ProjectCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('project-category-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $projectCategory =  ProjectCategorySection::latest()->get();
        return view('admin.pages.resource.category.index',compact('projectCategory'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $projectCategory = new ProjectCategorySection();
            $projectCategory->name = $request->name;
            $projectCategory->name_bn = $request->name_bn;
            $projectCategory->save();
            Toastr::success('Project Category Added Successfully', 'Success');
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
            $projectCategory = ProjectCategorySection::find($id);
            $projectCategory->name = $request->name;
            $projectCategory->name_bn = $request->name_bn;
            $projectCategory->status = $request->status;
            $projectCategory->save();
            Toastr::success('Project Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $projectCategory = ProjectCategorySection::find($id);
            $projectCategory->delete();
            Toastr::success('Project Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
