<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index (){
        return view('admin.pages.setting',['about'=>DB::table('about')->first()]);
    }
}
