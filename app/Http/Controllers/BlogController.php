<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.blog',[
            'posts' => Post::all(),
            'tags' => Tag::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1000',
            'body' => 'required',
            'date' => 'required',
            'created_by' => 'required',
            'preview' => 'required',
        ]);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token','image']);

        // dd($data);

        $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

        $data['secure_url'] = $image_uploaded->getSecurePath();

        $data['public_id']= $image_uploaded->getPublicId();

        $data['feature'] = $feature;

        $post = Post::create($data);

        if($post)
        {
            $tagNames = explode(',',$request->tags);

            $tagIds = [];

            foreach($tagNames as $tagName)
            {
                //$post->tags()->create(['name'=>$tagName]);
                //Or to take care of avoiding duplication of Tag
                //you could substitute the above line as
                $tag = Tag::where(['name'=>$tagName])->first();
                if($tag)
                {
                    $tagIds[] = $tag->id;
                }

            }

            $post->tags()->sync($tagIds);
        }

        return back()->with([
            'message' => 'post created successfully',
            'type' => 'success'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $blog)
    {
        $data = $request->except(['_token']);

        if ($request->has('image')) {

            cloudinary()->destroy($blog->first()->public_id);


            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }
	
	if($blog)
        {
            $tagNames = explode(',',$request->tags);

            $tagIds = [];

            foreach($tagNames as $tagName)
            {
                //$post->tags()->create(['name'=>$tagName]);
                //Or to take care of avoiding duplication of Tag
                //you could substitute the above line as
                $tag = Tag::where(['name'=>$tagName])->first();
                if($tag)
                {
                    $tagIds[] = $tag->id;
                }

            }

            $blog->tags()->sync($tagIds);
        }
        
        $blog->update($data);
        
        

        return back()->with([
            'message' => 'blog updated',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {

        cloudinary()->destroy($blog->first()->public_id);

        return back()->with([
            'message' => 'post deleted successfully',
            'type' => 'success'
        ]);
    }

    public function feature($id)
    {
        $post = Post::find($id);
	
        if($post->feature){
            $post->update(['feature' => false]);

            return back()->with([
                'message' => 'post removed from feature',
                'type' => 'success'
            ]);
        }else{
            $post->update(['feature' => true]);

            return back()->with([
                'message' => 'post featured ',
                'type' => 'success'
            ]);
        }
    }

    public function comment(Request $request,Post $post){

        // $this->validate($request,[
        //     'name' => 'required',
        //     'message' => 'required',
        //     'email' => 'email|required'
        // ]);

        $comment = new Comment($request->except('_token'));

        $post->comments()->save($comment);

        return [
            'message' => 'commented submitted',
            'type' => 'success'
        ];
        //Comment::create($request->except('_token'));
    }
}