<?php

namespace App\Http\Controllers;
use App\Tag;
use App\AdminHome;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create(Request $request){

        $tagNames = explode(',',$request->tags);

        foreach($tagNames as $tagName)
        {
            Tag::create(['name'=>$tagName]);
        }

        return back()->with([
            'message' => 'tags added successfully',
            'type' => 'success'
        ]);
    }

    public function index(){
        return Tag::all();
    }

    public function getTagPosts(Tag $tag){
    	// $adminHome = AdminHome::firstOrFail();
        return [
             $tag->posts()->where('feature' , true)->with('comments')->paginate(10),
            $tag
        ];

    }
}
