<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class CounterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('counter-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $counter =  Counter::latest()->get();
        return view('admin.pages.counter.index',compact('counter'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'counter_name' => 'required',
                'counter_no' => 'required',
            ]);
            $counter = new Counter();
            $counter->counter_name = $request->counter_name;
            $counter->counter_name_bn = $request->counter_name_bn;
            $counter->counter_no = $request->counter_no;
            $counter->save();
            Toastr::success('Counter Added Successfully', 'Success');
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
                'counter_name' => 'required',
                'counter_no' => 'required',
            ]);
            $counter = Counter::find($id);
            $counter->counter_name = $request->counter_name;
            $counter->counter_name_bn = $request->counter_name_bn;
            $counter->counter_no = $request->counter_no;
            $counter->status = $request->status;
            $counter->save();
            Toastr::success('Counter Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $counter = Counter::find($id);
            $counter->delete();
            Toastr::success('Counter Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


}
