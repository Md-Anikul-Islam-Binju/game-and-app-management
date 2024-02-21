<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Toastr;
class NoticeBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('notice-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $notice = Notice::latest()->get();
        return view('admin.pages.notice.index', compact('notice'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $fileName = time().'.'.$request->pdf_file->extension();
            $request->pdf_file->move(public_path('images/notice'), $fileName);
            $notice = new Notice();
            $notice->title = $request->title;
            $notice->title_en = $request->title_en;
            $notice->published_date = $request->published_date;
            $notice->descrip = $request->descrip;
            $notice->descrip_en = $request->descrip_en;
            $notice->entry_user = $request->entry_user;
            $notice->entry_date = $request->entry_date;
            $notice->pdf_file = $fileName;
            $notice->save();
            Toastr::success('Notice Added Successfully', 'Success');
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
            $notice = Notice::find($id);
            $notice->title = $request->title;
            $notice->title_en = $request->title_en;
            $notice->published_date = $request->published_date;
            $notice->descrip = $request->descrip;
            $notice->descrip_en = $request->descrip_en;

            $notice->entry_user = $request->entry_user;
            $notice->entry_date = $request->entry_date;

            $notice->status = $request->status;
            if($request->pdf_file){
                $fileName = time().'.'.$request->pdf_file->extension();
                $request->pdf_file->move(public_path('images/notice'), $fileName);
                $notice->pdf_file = $fileName;
            }
            $notice->save();
            Toastr::success('Notice Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $notice = Notice::find($id);
            $fileName = public_path('images/notice/' . $notice->pdf_file);
            if (file_exists($fileName)) {
                unlink($fileName);
            }
            $notice->delete();
            Toastr::success('Notice Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
