<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsPage(){
        return view('admin.pages.news', [
            'news' => News::all()
        ]);
    }

    public function createNews(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'link' => 'required',
            'date' => 'required',
        ]);

        $feature = $request->feature ? true : false;

        $data = $request->except(['_token']);

        $data['feature'] = $feature;

        News::create($data);

        return back()->with([
            'message' => 'created successfully',
            'type' => 'success'
        ]);
    }

    public function editNews(Request $request,$id){

        $news = News::find($id);

        $data = $request->except(['_token']);

        $feature = $request->feature ? true : false;

        $data['feature'] = $feature;

        $news->update($data);

        return back()->with([
            'message' => 'news updated',
            'type' => 'success'
        ]);
    }
    public function featureEvent($id){

        $news = News::find($id);

        if($news->feature){
            $news->update(['feature' => false]);

            return back()->with([
                'message' => 'news removed from feature',
                'type' => 'success'
            ]);
        }else{
            $news->update(['feature' => true]);

            return back()->with([
                'message' => 'news featured ',
                'type' => 'success'
            ]);
        }
    }

    public function deleteNews($id){

        $news = News::find($id);

        $news->delete();

        return back()->with([
            'message' => 'news deleted',
            'type' => 'success'
        ]);
    }
}
