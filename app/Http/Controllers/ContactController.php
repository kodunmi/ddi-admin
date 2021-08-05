<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function contactpage(){
        return view('admin.pages.edits.contact', [
            'contact' => DB::table('contact')->first(),
        ]);
    }

    public function updateContact(Request $request){
        $contact = DB::table('contact');

        if($contact->first()){
            $contact->where('id', $contact->first()->id)->update($request->except('_token'));
        }else{
            DB::table('contact')->insert($request->except('_token'));
        }

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }
}
