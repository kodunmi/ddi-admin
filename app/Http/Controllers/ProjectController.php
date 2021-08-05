<?php

namespace App\Http\Controllers;

use App\Image;
use App\Project;
use Illuminate\Http\Request;
// use Cloudinary\Cloudinary;


class ProjectController extends Controller
{
    public function upload($images, $folder){
        // $cloudinary = new Cloudinary('cloudinary://736998832126373:011FYcRw9a58kygEmjrfmmUrfQc@bikievents');

        $uploaded = [];
        foreach ($images as $image) {
            error_log('for statement fires.');
            $image_uploaded = cloudinary()->upload($image->getRealPath());

            array_push($uploaded, ['secure_url'=>$image_uploaded->getSecurePath(),'public_id'=>$image_uploaded->getPublicId()]);

        }
        return $uploaded;

    }

    public function projectpage(){
        return view('admin.pages.edits.projects',[
        'projects' => Project::all()
    ]);
    }

    public function viewproject(Project $project){
        return view('admin.pages.edits.project',[
        'project' => $project
    ]);
    }

    public function editproject(Request $request,Project $project){
        $data = $request->except(['_token','images','feature']);

        $data['is_featured'] = $request->feature ? true : false;


        $project->update($data);

        return back()->with([
            'message' => 'project updated',
            'type' => 'success'
        ]);
    }

    public function deleteProjectImage(Image $image){


        cloudinary()->destroy($image->public_id);

        $image->delete();

        return back()->with([
            'message' => 'image deleted',
            'type' => 'success'
        ]);
    }


    public function createproject(Request $request)
    {


       $project = new Project();

        $images = $this->upload($request->file('images'),$request->name);

        $feature = $request->feature ? true : false;



        $project->summary = $request->summary;
        $project->venue = $request->venue;
        $project->sponsor = $request->sponsor;
        $project->service = $request->service;
        $project->name = $request->name;
        $project->is_featured = $feature;
        $project->description = $request->description;
        $project->save();
        $project->images()->createMany($images);
    }

    public function featureproject($id){

        $project = Project::find($id);

        if($project->first()->is_featured){
            $project->update(['is_featured' => false]);

            return back()->with([
                'message' => 'project removed from feature',
                'type' => 'success'
            ]);
        }else{
            $project->update(['is_featured' => true]);

            return back()->with([
                'message' => 'project featured ',
                'type' => 'success'
            ]);
        }
    }


}
