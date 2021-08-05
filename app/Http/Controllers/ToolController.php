<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.tools', ['tools'=>Tool::all()]);
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
            'color' => 'required',
            'icon' => 'required',
            'what_we_do' => 'required',
        ]);

        $feature = $request->feature ? true : false;
        $data = $request->except(['_token']);
        $data['feature'] = $feature;

        Tool::create($data);

        return back()->with([
            'message' => 'tool created successfully',
            'type' => 'success'
        ]);
    }

   /**
     * Display on the frontend
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function feature(Tool $tool)
    {
        $tool->feature = true;
        $tool->save();

        return back()->with([
            'message' => 'Tool featured',
            'type' => 'success'
        ]);
    }

    /**
     * remove on the frontend
     *
     * @param  \App\Tool  $Tool
     * @return \Illuminate\Http\Response
     */
    public function unfeature(Tool $tool)
    {
        $tool->feature = false;
        $tool->save();

        return back()->with([
            'message' => 'Tool unfeatured',
            'type' => 'success'
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tool)
    {
        $tool = Tool::find($tool);
        $tool->name = $request->name;
        $tool->color = $request->color;
        $request->icon ? $tool->icon = $request->icon : '';
        $tool->save();

        // $tool->update($request->except('_token'));

        return back()->with([
            'message' => 'Tool updated',
            'type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy($tool)
    {

        $t = Tool::find($tool);

        foreach($t->meetings as $meeting){
            $image = public_path().'/images/meetings/'.$meeting->image;
            File::delete($image);

            foreach($meeting->photos as $photo){
                $p = public_path().'/images/meetings/'.$photo->image;
                File::delete($p);
            }
        }

        $t->delete();

        return back()->with([
            'message' => 'poll deleted',
            'type' => 'success'
        ]);
    }
}
