<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Toastr;
class UserMessageController extends Controller
{
    public function index()
    {
        $messages = UserMessage::latest()->paginate(50);
        return view('admin.pages.message.index', compact('messages'));
    }

    public function destroy($id)
    {
        try {
            $message = UserMessage::find($id);
            $message->delete();
            Toastr::success('Message Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
