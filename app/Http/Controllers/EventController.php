<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function eventsPage(){
        return view('admin.pages.edits.events', [
            'events' => Event::all()
        ]);
    }

    public function createEvent(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'opening' => 'required',
            'closing' => 'required',
            'date' => 'required',
            'image' => 'required',
            'location' => 'required'
        ]);



        $image_uploaded = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();;

        

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['image'] = $image_uploaded;
        $data['feature'] = $feature;

        Event::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editEvent(Request $request,$id){

        $event = Event::find($id);

        $data = $request->except(['_token']);

        if ($request->has('image')) {
            $file = public_path().'/images/events/'.$event->first()->image;
            File::delete($file);

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/events'), $imageName);

            $data['image'] = $imageName;
        }

        $event->update($data);

        return back()->with([
            'message' => 'event updated',
            'type' => 'success'
        ]);
    }
    public function featureEvent($id){

        $event = Event::find($id);

        if($event->feature){
            $event->update(['feature' => false]);

            return back()->with([
                'message' => 'event removed from feature',
                'type' => 'success'
            ]);
        }else{
            $event->update(['feature' => true]);

            return back()->with([
                'message' => 'event featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deleteEvent($id){

        $event = Event::find($id);
        $image = public_path().'/images/events/'.$event->first()->image;

        File::delete($image);

        $event->delete();

        return back()->with([
            'message' => 'event deleted',
            'type' => 'success'
        ]);
    }
}
