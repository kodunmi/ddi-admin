<?php

namespace App\Http\Controllers;

use App\Event;
use App\Meeting;
use App\Poll;
use App\Publication;
use App\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'sliders' => DB::table('home_slider')->where('feature', true)->get(),
            'partners' => DB::table('partners')->where('feature', true)->get(),
            'events' => Event::where('feature', true)->latest()->take(3)->get(),
            'poll' => Poll::where('feature', true)->get()->first()
        ]);
    }

    public function board()
    {
        return view('pages.board', [
            'slider' => DB::table('board_slider')->where('feature', true)->latest()->first(),
            'boards' => DB::table('boards')->where('feature', true)->get(),
        ]);
    }

    public function team()
    {
        return view('pages.team', [
            'teams' => DB::table('teams')->where('feature', true)->get(),
        ]);
    }

    public function partners()
    {
        return view('pages.partners', [
            'slider' => DB::table('partners_slide')->where('feature', true)->latest()->first(),
            'partners' => DB::table('partners')->where('feature', true)->get()
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'contact' => DB::table('contact')->first(),
            'partners' => DB::table('partners')->where('feature', true)->get(),
        ]);
    }

    public function projects()
    {
        return view('pages.projects', [
            'sliders' => DB::table('program_slide')->where('feature', true)->get()
        ]);
    }

    public function media()
    {
        return view('pages.media', [
            'sliders' => DB::table('multimedia_slide')->where('feature', true)->latest()->first(),
            'photos' => DB::table('gallary_photos')->where('feature', true)->get()
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function publications()
    {
        return view('pages.publcations', [
            'publications' => Publication::latest()->get()
        ]);
    }

    public function publicationDownload($id)
    {
        $publication = Publication::find($id);

        $file = public_path() . "/documents/publications/" . $publication->doc;
        $headers = [
            'Cache-Control' => 'max-age=0',
        ];

        $publication->count()->increment('counts', 1);
        $name = $publication->name . '-' . $publication->doc;

        return response()->download($file, $name, $headers);
    }

    public function events()
    {
        return view('pages.events', [
            'events' => Event::where('feature', true)->latest()->get()
        ]);
    }

    public function diplomacy()
    {
        return view('pages.diplomacy', [
            'tools' => Tool::where('what_we_do', 'diplomacy')->where('feature', true)->get()
        ]);
    }

    public function democracy()
    {
        return view('pages.democracy', [
            'tools' => Tool::where('what_we_do', 'democracy')->where('feature', true)->get()
        ]);
    }

    public function development()
    {
        return view('pages.development', [
            'tools' => Tool::where('what_we_do', 'development')->where('feature', true)->get()
        ]);
    }

    public function tool($tool)
    {
        return view('pages.meetings',[
            'tool' => Tool::findOrFail($tool)
        ]);
    }

    public function meeting($meeting)
    {
        return view('pages.meeting',[
            'meeting' => Meeting::findOrFail($meeting)
        ]);
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:subscribers']
        ]);

        if ($validator->passes()) {
            DB::table('subscribers')->insert(['email' => $request->email]);
            return response()->json(['success' => 'You have subscribed to our mailing list'], 200);
        } else {
            return response()->json(['error' => $validator->errors()->all()], 400);
        }
    }

    public function whatWeDo()
    {
        return view('pages.what-we-do');
    }
}
