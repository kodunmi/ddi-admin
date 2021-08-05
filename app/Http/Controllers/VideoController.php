<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videoPage(){
        return view('admin.pages.video', [
            'videos' => Video::all()
        ]);
    }

    public function createvideo(Request $request){

        $this->validate($request,[
            'text' => 'required',
            'link' => 'required',
        ]);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['feature'] = $feature;

        Video::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editvideo(Request $request,$id){

        $video = Video::find($id);

        $data = $request->except(['_token']);

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $video->update($data);

        return back()->with([
            'message' => 'video updated',
            'type' => 'success'
        ]);
    }
    public function featurevideo($id){

        $video = Video::find($id);

        if($video->feature){
            $video->update(['feature' => false]);

            return back()->with([
                'message' => 'video removed from feature',
                'type' => 'success'
            ]);
        }else{
            $video->update(['feature' => true]);

            return back()->with([
                'message' => 'video featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deletevideo($id){

        $video = Video::find($id);

        $video->delete();

        return back()->with([
            'message' => 'video deleted',
            'type' => 'success'
        ]);
    }
}
