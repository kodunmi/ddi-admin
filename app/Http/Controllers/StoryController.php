<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function storyPage(){
        return view('admin.pages.story', [
            'stories' => Story::all()
        ]);
    }

    public function createStory(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'summary' => 'required',
        ]);

        $secure_url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['feature'] = $feature;
        $data['secure_url'] = $secure_url;
        $data['public_id'] = $public_id;

        Story::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editStory(Request $request,$id){

        $story = Story::find($id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {

            cloudinary()->destroy($story->public_id);


            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $story->update($data);

        return back()->with([
            'message' => 'story updated',
            'type' => 'success'
        ]);
    }
    public function featurestory($id){

        $story = Story::find($id);

        if($story->feature){
            $story->update(['feature' => false]);

            return back()->with([
                'message' => 'story removed from feature',
                'type' => 'success'
            ]);
        }else{
            $story->update(['feature' => true]);

            return back()->with([
                'message' => 'story featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deletestory($id){

        $story = Story::find($id);

        cloudinary()->destroy($story->public_id);

        $story->delete();

        return back()->with([
            'message' => 'story deleted',
            'type' => 'success'
        ]);
    }
}
