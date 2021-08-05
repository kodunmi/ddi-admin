<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function partnerspage(){
        return view('admin.pages.edits.partners', [
            'partners' => DB::table('partners')->get()
        ]);
    }

    public function createpartner(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $secure_url = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();
        $public_id = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token','image']);

        $data['feature'] = $feature;
        $data['secure_url'] = $secure_url;
        $data['public_id'] = $public_id;

        DB::table('partners')->insert($data);

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }

    public function editPartner(Request $request,$id){

        $partner = DB::table('partners')->where('id',$id);

        $data = $request->except(['_token','image']);

        if ($request->has('image')) {
            cloudinary()->destroy($$member->first()->public_id);

            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }

        $partner->update($data);

        return back()->with([
            'message' => 'partner updated',
            'type' => 'success'
        ]);
    }
    public function featurepartner($id){

        $partner = DB::table('partners')->where('id',$id);

        if($partner->first()->feature){
            $partner->update(['feature' => false]);

            return back()->with([
                'message' => 'partner removed from feature',
                'type' => 'success'
            ]);
        }else{
            $partner->update(['feature' => true]);

            return back()->with([
                'message' => 'partner featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deletepartner($id){

        $partner = DB::table('partners')->where('id',$id);
        cloudinary()->destroy($partner->first()->public_id);
        $partner->delete();

        return back()->with([
            'message' => 'partner deleted',
            'type' => 'success'
        ]);
    }
}
