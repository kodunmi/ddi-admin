<?php

namespace App\Http\Controllers;

use App\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function careerPage(){
        return view('admin.pages.career', [
            'careers' => Career::all()
        ]);
    }

    public function createCareer(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        // dd($request->except(['_token']));

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['feature'] = $feature;

        Career::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editCareer(Request $request,$id){

        $career = Career::find($id);

        $data = $request->except(['_token']);


        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $career->update($data);

        return back()->with([
            'message' => 'career updated',
            'type' => 'success'
        ]);
    }
    public function featureCareer($id){

        $career = Career::find($id);

        if($career->feature){
            $career->update(['feature' => false]);

            return back()->with([
                'message' => 'career removed from feature',
                'type' => 'success'
            ]);
        }else{
            $career->update(['feature' => true]);

            return back()->with([
                'message' => 'career featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deleteCareer($id){

        $career = Career::find($id);

        $career->delete();

        return back()->with([
            'message' => 'career deleted',
            'type' => 'success'
        ]);
    }
}
