<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailingController extends Controller
{
    public function index()
    {
        return view('admin.pages.mailing-list', ['subscribers' => DB::table('subscribers')->get()]);
    }
}
