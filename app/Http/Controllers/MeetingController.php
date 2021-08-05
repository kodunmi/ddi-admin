<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.meetings', [
            'meetings'=> Meeting::all(),
            'tools' => Tool::all()
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
        // dd($request->all());

        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'description' => 'required',
            'tool_id' => 'required'
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/meetings'), $imageName);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['image'] = $imageName;
        $data['feature'] = $feature;
        // dd($data);
        Meeting::create($data);

        return back()->with([
            'message' => 'meeting created successfully',
            'type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show($meeting)
    {
        return view('admin.pages.meeting', [
            'meeting'=> Meeting::find($meeting),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $meeting)
    {
        $meeting = Meeting::find($meeting);

        // $data = $request->except(['_token', 'icon']);

        $data = $request->icon ? $request->except(['_token']) : $request->except(['_token', 'icon']);

        if ($request->has('image')) {
            $file = public_path().'/images/meetings/'.$meeting->first()->image;
            File::delete($file);

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/meetings'), $imageName);

            $data['image'] = $imageName;
        }

        $meeting->update($data);

        return back()->with([
            'message' => 'meeting edited successfully',
            'type' => 'success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy($meeting)
    {
        $meeting = Meeting::find($meeting);

        $image = public_path().'/images/meetings/'.$meeting->first()->image;

        File::delete($image);

        foreach($meeting->photos as $photo){
            $p = public_path().'/images/meetings/'.$photo->image;
            File::delete($p);
        }

        $meeting->delete();

        return back()->with([
            'message' => 'meeting deleted',
            'type' => 'success'
        ]);
    }
}
