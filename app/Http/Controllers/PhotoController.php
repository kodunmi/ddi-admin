<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function photoPage(){
        return view('admin.pages.photo', [
            'photos' => Photo::all()
        ]);
    }

    public function createphoto(Request $request){

        $this->validate($request,[
            'text' => 'required',
            'image' => 'mimes:jpeg,jpg,png,mp4,mov,ogg,qt|required|max:10000'
        ]);

        $secure_url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token','image']);

        $data['feature'] = $feature;
        $data['secure_url'] = $secure_url;
        $data['public_id'] = $public_id;

        Photo::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editphoto(Request $request,$id){

        $photo = Photo::find($id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {

            cloudinary()->destroy($photo->first()->public_id);


            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $photo->update($data);

        return back()->with([
            'message' => 'photo updated',
            'type' => 'success'
        ]);
    }
    public function featurephoto($id){

        $photo = Photo::find($id);

        if($photo->feature){
            $photo->update(['feature' => false]);

            return back()->with([
                'message' => 'photo removed from feature',
                'type' => 'success'
            ]);
        }else{
            $photo->update(['feature' => true]);

            return back()->with([
                'message' => 'photo featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deletephoto($id){

        $photo = Photo::find($id);

        cloudinary()->destroy($photo->public_id);

        $photo->delete();

        return back()->with([
            'message' => 'photo deleted',
            'type' => 'success'
        ]);
    }
}
