<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    public function switchPage($page){
        switch ($page) {
            case 'home':
                $db = 'home_slider';
                break;
            case 'board':
                $db = 'board_slider';
                break;
            case 'partners':
                $db = 'partners_slide';
                break;
            case 'program':
                $db = 'program_slide';
                break;
            case 'multimedia':
                $db = 'multimedia_slide';
                break;
            default:
                # code...
                break;
        }

        return $db;
    }
    public function addSlide(Request $request,$page){


        $secure_url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();


        $feature = $request->feature ? true : false;

        DB::table($this->switchPage($page))->insert([
            'public_id' => $public_id,
            'secure_url' => $secure_url,
            'header' => $request->header,
            'sub_header' => $request->sub_header,
            'feature' => $feature,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return back()->with([
            'message' => 'new slide added to home screen',
            'type' => 'success'
        ]);
    }

    public function feature($page,$id){

        $slide = DB::table($this->switchPage($page))->where('id',$id);

        if($slide->first()->feature){
            $slide->update(['feature' => false]);

            return back()->with([
                'message' => 'slide removed from feature',
                'type' => 'success'
            ]);
        }else{
            $slide->update(['feature' => true]);

            return back()->with([
                'message' => 'slide featured ',
                'type' => 'success'
            ]);
        }
    }

    public function editSlide(Request $request, $page, $id){

        $slide = DB::table($this->switchPage($page))->where('id',$id);

        $slide->update([
            'header' => $request->header,
            'sub_header' => $request->sub_header,
        ]);

        return back()->with([
            'message' => 'slide updated',
            'type' => 'success'
        ]);
    }

    public function deleteSlide($page, $id){

        $slide = DB::table($this->switchPage($page))->where('id',$id);

        cloudinary()->destroy($slide->public_id);

        $slide->delete();

        return back()->with([
            'message' => 'slide deleted',
            'type' => 'success'
        ]);
    }
}
