<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function programpage(){
        return view('admin.pages.edits.program', [
            'slides' => DB::table('program_slide')->get()
        ]);
    }
}
