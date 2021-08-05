<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class multimediaController extends Controller
{
    public function multimediapage(){
        return view('admin.pages.edits.multimedia', [
            'slides' => DB::table('multimedia_slide')->get(),
            'photos' => DB::table('gallary_photos')->get()
        ]);
    }

    public function imageUpload(Request $request){
        $this->validate($request,[
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/galary'), $imageName);

        $feature = $request->feature == 1 ? true : false;

        $data = $request->except(['_token']);

        $data['image'] = $imageName;
        $data['feature'] = $feature;

        DB::table('gallary_photos')->insert($data);

        return back()->with([
            'message' => 'image upload',
            'type' => 'success'
        ]);
    }

    public function photoFeature($id){

        $slide = DB::table('gallary_photos')->where('id',$id);

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

    public function photoDelete($id){

        $photo = DB::table('gallary_photos')->where('id',$id);
        $file = public_path().'/images/galary/'.$photo->first()->image;


        File::delete($file);
        // if(File::exists($file)){
        //     File::delete($file);
        // }
        $photo->delete();

        return back()->with([
            'message' => 'photo deleted',
            'type' => 'success'
        ]);
    }
}
