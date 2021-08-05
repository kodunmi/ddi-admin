<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homepage(){
        return view('admin.pages.edits.home', [
            'slides' => DB::table('home_slider')->get(),
            'about' => DB::table('about')->first()
        ]);
    }

    public function updateAbout(Request $request){
        $about = DB::table('about');

        if($about->first()){
            $about->where('id', $about->first()->id)->update($request->except('_token'));
        }else{
            DB::table('about')->insert($request->except('_token'));
        }

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }
}
