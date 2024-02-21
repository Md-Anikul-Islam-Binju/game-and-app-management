<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class VenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('venue-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $venue = Venue::latest()->get();
        return view('admin.pages.venue.index', compact('venue'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);
            $venue = new Venue();
            $venue->name = $request->name;
            $venue->address = $request->address;
            $venue->save();
            Toastr::success('Venue Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);
            $venue = Venue::find($id);
            $venue->name = $request->name;
            $venue->address = $request->address;
            $venue->status = $request->status;
            $venue->save();
            Toastr::success('Venue Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $venue = Venue::find($id);
            $venue->delete();
            Toastr::success('Venue Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
