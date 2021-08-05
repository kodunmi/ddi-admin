<?php

namespace App\Http\Controllers;

use App\Option;
use App\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.poll', ['polls'=>Poll::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $optionsModels = [];

        foreach ($request->options as $option) {
            $optionsModels[] = new Option([
                'option' => $option
            ]);
        }

        if ($request->feature) {
            Poll::where('feature', true)->update(['feature' => false]);
        }

        $feature = $request->feature ? true : false;

        $poll = new Poll();
        $poll->question = $request->question;
        $poll->feature = $feature;
        $poll->save();

        $poll->options()->saveMany($optionsModels);

        return back()->with([
            'message' => 'poll submitted',
            'type' => 'success'
        ]);
    }

    /**
     * Display on the frontend
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function feature(Poll $poll)
    {
        Poll::where('feature', true)->update(['feature' => false]);
        $poll->feature = true;
        $poll->save();

        return back()->with([
            'message' => 'poll featured',
            'type' => 'success'
        ]);
    }

    /**
     * remove on the frontend
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function unfeature(Poll $poll)
    {
        $poll->feature = false;
        $poll->save();

        return back()->with([
            'message' => 'poll unfeatured',
            'type' => 'success'
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->delete();
        return back()->with([
            'message' => 'poll deleted',
            'type' => 'success'
        ]);
    }

    /**
     * Vote
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request)
    {
       $option = Option::find($request->option)->increment('votes', 1);

       $poll = Option::find($request->option)->poll;

       $sumOfVote = $poll->options->sum('votes');

        $percentages = [];

       foreach ($poll->options as $option) {
           $percentages[] = ['name' => $option->option, 'percentage' => round($option->votes/$sumOfVote * 100, 2)];
       }

        return response()->json(['message'=>'thanks for submitting your vote', 'percentages' => $percentages], 200);
    }
}
