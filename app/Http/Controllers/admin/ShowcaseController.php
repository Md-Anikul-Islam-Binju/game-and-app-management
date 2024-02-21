<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Traits\HasRoles;
use Toastr;

class ShowcaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('showcase-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }


    public function index()
    {
        $showcase  = Showcase::latest()->get();
        return view('admin.pages.showcase.index', compact('showcase'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $cover = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/showcase/cover'), $cover);

            if($request->background_image){
                $background = time().'.'.$request->background_image->extension();
                $request->background_image->move(public_path('images/showcase/background'), $background);
            }


            $showcase = new Showcase();
            $showcase->title = $request->title;
            $showcase->title_bn = $request->title_bn;
            $showcase->name = $request->name;
            $showcase->name_bn = $request->name_bn;
            $showcase->play_store_link = $request->play_store_link;
            $showcase->app_store_link = $request->app_store_link;
            $showcase->background_color = $request->background_color;
            $showcase->details = $request->details;
            $showcase->details_bn = $request->details_bn;
            $showcase->image = $cover;
            $showcase->background_image = $background??null;
            $showcase->save();
            Toastr::success('Showcase Added Successfully', 'Success');
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
                'name' => 'required',
            ]);
            $showcase = Showcase::find($id);
            $showcase->title = $request->title;
            $showcase->title_bn = $request->title_bn;
            $showcase->name = $request->name;
            $showcase->name_bn = $request->name_bn;
            $showcase->play_store_link = $request->play_store_link;
            $showcase->app_store_link = $request->app_store_link;
            $showcase->background_color = $request->background_color;
            $showcase->details = $request->details;
            $showcase->details_bn = $request->details_bn;
            $showcase->status = $request->status;
            if($request->image){
                $cover = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/showcase/cover'), $cover);
                $showcase->image = $cover;
            }
            if($request->background_image){
                $background = time().'.'.$request->background_image->extension();
                $request->background_image->move(public_path('images/showcase/background'), $background);
                $showcase->background_image = $background;
            }
            $showcase->save();
            Toastr::success('Showcase Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $showcase = Showcase::find($id);
            // Delete associated image from server
            $cover = public_path('images/showcase/cover/' . $showcase->image);
            if (file_exists($cover)) {
                unlink($cover);
            }
            if($showcase->background_image){
                $background = public_path('images/showcase/background/' . $showcase->background_image);
                if (file_exists($background)) {
                    unlink($background);
                }
            }
            // Delete the Team member
            $showcase->delete();
            Toastr::success('Showcase Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
