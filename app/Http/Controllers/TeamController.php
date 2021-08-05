<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function teampage(){
        return view('admin.pages.edits.team', [
            'teams' => DB::table('teams')->get()
        ]);
    }

    public function createteam(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'position' => 'required',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/team'), $imageName);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['image'] = $imageName;
        $data['feature'] = $feature;

        DB::table('teams')->insert($data);

        return back()->with([
            'message' => 'updated successfully',
            'type' => 'success'
        ]);
    }

    public function editteam(Request $request, $id){
        $member = DB::table('teams')->where('id',$id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {
            $file = public_path().'/images/team/'.$member->first()->image;
            File::delete($file);

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/team'), $imageName);

            $data['image'] = $imageName;
        }

        $member->update($data);

        return back()->with([
            'message' => 'team updated',
            'type' => 'success'
        ]);
    }

    public function featureteam($id){

        $member = DB::table('teams')->where('id',$id);

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

    public function deleteteam($id){

        $member = DB::table('teams')->where('id',$id);
        $file = public_path().'/images/team/'.$member->first()->image;


        File::delete($file);
        // if(File::exists($file)){
        //     File::delete($file);
        // }
        $member->delete();

        return back()->with([
            'message' => 'member deleted',
            'type' => 'success'
        ]);
    }
}
