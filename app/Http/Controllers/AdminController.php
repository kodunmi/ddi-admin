<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Count;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

       return view('admin.pages.dashboard', [
           'admins' => Admin::all(),
           'messages' => Message::all(),
           'unread_messages' => Message::where('read_at', null)->get(),
           'download_count' => Count::sum('counts'),

       ]);
    }

    public function delAdmin($id){

        if(Admin::all()->count() == 1){
            return back()->with([
                'message' => 'You cannot delete the last admin',
                'type' => 'danger'
            ]);
        }
        Admin::find($id)->delete();

        return back()->with([
            'message' => 'admin has been deleted successfully',
            'type' => 'success'
        ]);
    }

    public function addAdmin(Request $request){

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $admin = new Admin;
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with([
            'message' => 'new admin registered successfully',
            'type' => 'success'
        ]);

    }
}
