<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BoardController extends Controller
{
    public function boardpage(){
        return view('admin.pages.edits.board', [
            'boards' => DB::table('boards')->get()
        ]);
    }

    public function createBoard(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'text' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'position' => 'required',
            'type' => 'required',

        ]);



        $secure_url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token','image']);

        $data['feature'] = $feature;
        $data['secure_url'] = $secure_url;
        $data['public_id'] = $public_id;

        DB::table('boards')->insert($data);

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }

    public function editBoard(Request $request, $id){
        $member = DB::table('boards')->where('id',$id);

        $data = $request->except(['_token','image']);

        if ($request->has('image')) {
            cloudinary()->destroy($$member->first()->public_id);

            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }

        $member->update($data);

        return back()->with([
            'message' => 'board updated',
            'type' => 'success'
        ]);
    }

    public function featureBoard($id){

        $member = DB::table('boards')->where('id',$id);

        if($member->first()->feature){
            $member->update(['feature' => false]);

            return back()->with([
                'message' => 'member removed from feature',
                'type' => 'success'
            ]);
        }else{
            $member->update(['feature' => true]);

            return back()->with([
                'message' => 'member featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deleteBoard($id){

        $member = DB::table('boards')->where('id',$id);

        cloudinary()->destroy($member->first()->public_id);

        $member->delete();

        return back()->with([
            'message' => 'mem$member deleted',
            'type' => 'success'
        ]);
    }
}
