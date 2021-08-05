<?php

namespace App\Http\Controllers;

use App\Count;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PublicationController extends Controller
{
    public function publicationspage(){
        return view('admin.pages.edits.publications', [
            'publications' => Publication::all()
        ]);
    }

    public function createpublication(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'doc' => 'required|file',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/publications'), $imageName);

        $docName = time().'.'.request()->doc->getClientOriginalExtension();
        request()->doc->move(public_path('documents/publications'), $docName);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['image'] = $imageName;
        $data['doc'] = $docName;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['feature'] = $feature;

        $pub = Publication::create($data);

        $counts = new Count();

        $pub->count()->save($counts);
        // DB::table('publications')->insert($data);

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }

    public function editPublication(Request $request,$id){

        $publication = DB::table('publications')->where('id',$id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {
            $file = public_path().'/images/publications/'.$publication->first()->image;
            File::delete($file);

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/publications'), $imageName);

            $data['image'] = $imageName;
        }

        if ($request->has('doc')) {
            $file = public_path().'/documents/publications/'.$publication->first()->doc;
            File::delete($file);

            $docName = time().'.'.request()->doc->getClientOriginalExtension();
            request()->doc->move(public_path('documents/publications'), $docName);

            $data['doc'] = $docName;
        }

        $publication->update($data);

        return back()->with([
            'message' => 'publication updated',
            'type' => 'success'
        ]);
    }
    public function featurepublication($id){

        $publication = DB::table('publications')->where('id',$id);

        if($publication->first()->feature){
            $publication->update(['feature' => false]);

            return back()->with([
                'message' => 'publication removed from feature',
                'type' => 'success'
            ]);
        }else{
            $publication->update(['feature' => true]);

            return back()->with([
                'message' => 'publication featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deletepublication($id){

        $publication = DB::table('publications')->where('id',$id);
        $image = public_path().'/images/publications/'.$publication->first()->image;
        $doc = public_path().'/documents/publications/'.$publication->first()->doc;

        // dd($image);

        File::delete($image);
        File::delete($doc);
        // if(File::exists($file)){
        //     File::delete($file);
        // }
        $publication->delete();

        return back()->with([
            'message' => 'publication deleted',
            'type' => 'success'
        ]);
    }
}
