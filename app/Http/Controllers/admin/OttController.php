<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ott;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class OttController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('ott-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $ott = Ott::latest()->get();
        return view('admin.pages.ott.index', compact('ott'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/ott'), $imageName);
            $ott = new Ott();
            $ott->title = $request->title;
            $ott->title_bn = $request->title_bn;
            $ott->link = $request->link;
            $ott->details = $request->details;
            $ott->details_bn = $request->details_bn;
            $ott->image = $imageName;
            $ott->save();
            Toastr::success('Orr Info Added Successfully', 'Success');
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
            $ott = Ott::find($id);
            $ott->title = $request->title;
            $ott->title_bn = $request->title_bn;
            $ott->link = $request->link;
            $ott->details = $request->details;
            $ott->details_bn = $request->details_bn;
            $ott->status = $request->status;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/ott'), $imageName);
                $ott->image = $imageName;
            }
            $ott->save();
            Toastr::success('Ott Info Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $ott = Ott::find($id);
            $imagePath = public_path('images/ott/' . $ott->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $ott->delete();
            Toastr::success('Ott Info Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
