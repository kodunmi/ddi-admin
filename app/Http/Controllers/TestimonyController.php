<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function testimonyPage()
    {
        return view('admin.pages.testimony',[
            'testimonies' => Testimony::all()
        ]);
    }

    public function createTestimony(Request $request)
    {

        $data = $request->except(['image','_token','feature']);

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $data ['secure_url'] = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        $data['public_id'] = cloudinary()->upload($request->file('image')->getRealPath())->getPublicId();

        Testimony::create($data);

        return back()->with([
            'message' => 'testimony created',
            'type' => 'success'
        ]);
    }

    public function editTestimony(Request $request,$id){

        $testimony = Testimony::find($id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {

            cloudinary()->destroy($testimony->public_id);


            $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath());

            $data['secure_url'] = $image_uploaded->getSecurePath();

            $data['public_id']= $image_uploaded->getPublicId();
        }

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $testimony->update($data);

        return back()->with([
            'message' => 'testimony updated',
            'type' => 'success'
        ]);
    }

    public function featureTestimony($id){

        $testimony = Testimony::find($id);

        if($testimony->feature){
            $testimony->update(['feature' => false]);

            return back()->with([
                'message' => 'testimony removed from feature',
                'type' => 'success'
            ]);
        }else{
            $testimony->update(['feature' => true]);

            return back()->with([
                'message' => 'testimony featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deleteTestimony($id){

        $testimony = Testimony::find($id);

        cloudinary()->destroy($testimony->public_id);

        $testimony->delete();

        return back()->with([
            'message' => 'testimony deleted',
            'type' => 'success'
        ]);
    }
}
