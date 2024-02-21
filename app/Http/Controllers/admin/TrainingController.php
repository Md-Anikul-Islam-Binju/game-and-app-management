<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('training-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
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
        return view('admin.pages.training.index', compact('venues', 'trainings'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/training'), $imageName);

            $training = new Training();
            $training->name = $request->name;
            $training->name_bn = $request->name_bn;
            $training->start_date = $request->start_date;
            $training->end_date = $request->end_date;
            $training->duration = $request->duration;
            $training->total_student = $request->total_student;
            $training->total_venue = $request->total_venue;
            $training->details = $request->details;
            $training->details_bn = $request->details_bn;
            $training->venue_id = json_encode($request->venue_id);
            $training->image = $imageName;
            $training->save();
            Toastr::success('Training Added Successfully', 'Success');
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
            $training = Training::find($id);
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/training'), $imageName);
                $training->image = $imageName;
            }
            $training->name = $request->name;
            $training->name_bn = $request->name_bn;
            $training->start_date = $request->start_date;
            $training->end_date = $request->end_date;
            $training->duration = $request->duration;
            $training->total_student = $request->total_student;
            $training->total_venue = $request->total_venue;
            $training->details = $request->details;
            $training->details_bn = $request->details_bn;
            $training->venue_id = json_encode($request->venue_id);
            $training->status = $request->status;
            $training->save();
            Toastr::success('Training Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $training = Training::find($id);
            $imagePath = public_path('images/training/' . $training->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $training->delete();
            Toastr::success('Training Delete Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
