<?php

use App\Career;
use App\Event;
use App\News;
use App\Photo;
use App\Post;
use App\Project;
use App\Story;
use App\Testimony;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/projects', function (Request $request) {
    $proj = Project::with('images')->where('is_featured',true)->paginate(20);
    return response()->json($proj,200);
});

Route::get('/projects/{id}', function (Request $request, $id) {
    $proj = Project::with('images')->find($id);
    return response()->json($proj,200);
});

Route::get('/projects/what-we-do/{id}', function (Request $request, $id) {
    $proj = Project::with('images')->where(['service'=>$id, 'is_featured' => true])->paginate(2000);
    return response()->json($proj,200);
});


Route::get('/posts', function () {
    $proj = Post::with('comments')->where('feature',true)->latest('date')->paginate(20);
    return response()->json($proj,200);
});

Route::get('/posts/{id}', function ($id) {
    $proj = Post::with(['comments','tags'])->find($id);

    $previous = Post::find(Post::where('id', '<', $proj->id)->max('id'));

    // get next user id
    $next = Post::find(Post::where('id', '>', $proj->id)->min('id'));

    return response()->json([$proj, $previous, $next],200);
});

Route::post('comment/{post}', 'BlogController@comment');

Route::get('tags' , 'TagController@index');

Route::get('latest-post' , function(){
    return response()->json(Post::with('comments')->latest('date')->limit(3)->get(),200);
});

Route::get('tag/{tag}' , 'TagController@getTagPosts')->name('tag.posts');

Route::get('events' , function(){
    return response()->json(Event::where('feature',true)->latest('date')->get(),200);
});

Route::get('events/{event}' , function(Event $event){
    return response()->json($event,200);
});

Route::get('news' , function(){
    return response()->json(News::where('feature',true)->latest()->get(),200);
});

Route::get('stories' , function(){
    return response()->json(Story::where('feature',true)->latest()->paginate(20),200);
});

Route::get('stories/{story}' , function(Story $story){
    return response()->json($story,200);
});

Route::get('latest-stories' , function(){
    return response()->json(Story::latest('created_at')->limit(3)->get(),200);
});

Route::get('photos' , function(){
    return response()->json(Photo::where('feature',true)->latest()->get(['secure_url','text']),200);
});

Route::get('videos' , function(){
    return response()->json(Video::where('feature',true)->latest()->get(['link','text']),200);
});

Route::get('members' , function(){
    return response()->json(DB::table('boards')->latest()->get(),200);
});

Route::get('partners' , function(){
    return response()->json(DB::table('partners')->latest()->get(),200);
});

Route::get('contact' , function(){
    return response()->json(DB::table('contact')->first(),200);
});

Route::get('about' , function(){
    return response()->json(DB::table('about')->first(),200);
});

Route::get('slides' , function(){
    return response()->json(DB::table('home_slider')->get(),200);
});

Route::get('testimonies' , function(){
    return response()->json(Testimony::where('feature',true)->latest()->limit(3)->get(),200);
});

Route::get('jobs' , function(){
    return response()->json(Career::where('feature',true)->latest()->get(),200);
});

Route::get('jobs/{id}' , function($id){
    return response()->json(Career::find($id),200);
});

Route::post('send-message', 'MessageController@sendMessage');
