<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Toastr;
class ContactUsController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::first();
        return view('frontend.pages.contactUs', compact('siteSetting'));
    }

    public function storeMessage(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $message = new UserMessage();
            $message->name = $request->name;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->subject = $request->subject;
            $message->details = $request->details;
            $message->save();
            Toastr::success('Message Sent Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
