<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Toastr;
class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('admin.pages.menu.index', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name_en' => 'required',
                'name_bn' => 'required',
            ]);
            $menu = Menu::find($id);
            $menu->name_en = $request->name_en;
            $menu->name_bn = $request->name_bn;
            $menu->order_no = $request->order_no;
            $menu->status = $request->status;
            $menu->save();
            Toastr::success('Menu Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }




}
