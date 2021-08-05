<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Message;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear_cache', function() {
    Artisan::call('cache:clear');
});
Route::get('/clear_route', function() {
    Artisan::call('route:clear');
});

Route::get('/view_route', function() {
    Artisan::call('view:clear');
});

Route::get('/savanna1/down', function() {
    Artisan::call('down');
});

Route::get('/savanna1/up', function() {
    Artisan::call('up');
});

// Route::get('/', 'PagesController@home')->name('home');
Route::get('/' , 'SessionController@showAdminForm')->name('admin.login');
// Route::get('/board', 'PagesController@board')->name('board');
// Route::get('/team', 'PagesController@team')->name('team');
// Route::get('/partners', 'PagesController@partners')->name('partners');
// Route::get('/contact', 'PagesController@contact')->name('contact');
// Route::get('/about', 'PagesController@about')->name('about');
// Route::get('/events', 'PagesController@events')->name('events');
// Route::get('/publications', 'PagesController@publications')->name('publications');
// Route::get('/publication/{id}', 'PagesController@publicationDownload')->name('publication.download');

// Route::get('/diplomacy', 'PagesController@diplomacy')->name('diplomacy');
// Route::get('/development', 'PagesController@development')->name('development');
// Route::get('/democracy', 'PagesController@democracy')->name('democracy');

// Route::get('/tools/{tool}', 'PagesController@tool')->name('tool');
// Route::get('/tools/meetings/{meeting}', 'PagesController@meeting')->name('meeting');



// Route::get('/projects', 'PagesController@projects')->name('projects');
Route::get('/multimedia', 'PagesController@media')->name('media');
Route::get('/what-we-do', 'PagesController@whatWeDo')->name('whatWeDo');
Route::post('/subscribe', 'PagesController@subscribe')->name('subscribe');
Route::post('send-message', 'MessageController@sendMessage')->name('message.send');
Route::post('vote', 'PollController@vote')->name('poll.vote');

Route::get('tags' , 'TagController@index');
Route::get('tag/{tag}' , 'TagController@getTagPosts')->name('tag.posts');

/*
 the admin routes
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard' , 'AdminController@index')->name('admin.dashboard');
    Route::post('/add-admin' , 'AdminController@addAdmin')->name('admin.create');
    Route::get('/delete-admin/{id}' , 'AdminController@delAdmin')->name('admin.delete');

    Route::get('/seeting', 'SettingController@index')->name('setting.page');
    Route::resource('service', ServiceController::class);

    //edit
    Route::get('/home-page' , 'HomeController@homepage')->name('home.page');
    Route::post('update-about' , 'HomeController@updateAbout')->name('about.update');

    Route::get('/mailing-list', 'MailingController@index')->name('mailin.list');

    Route::get('/board-page' , 'BoardController@boardpage')->name('board.page');
    Route::post('create-board' , 'BoardController@createBoard')->name('board.create');
    Route::post('edit-board/{id}' , 'BoardController@editBoard')->name('board.edit');
    Route::get('feature-board-member/{id}' , 'BoardController@featureBoard')->name('board.feature');
    Route::get('delete-board-member/{id}' , 'BoardController@deleteBoard')->name('board.delete');


    // for team
    Route::get('/team-page' , 'TeamController@teampage')->name('team.page');
    Route::post('create-team' , 'TeamController@createteam')->name('team.create');
    Route::post('edit-team/{id}' , 'TeamController@editteam')->name('team.edit');
    Route::get('feature-team-member/{id}' , 'TeamController@featureteam')->name('team.feature');
    Route::get('delete-team-member/{id}' , 'TeamController@deleteteam')->name('team.delete');

    // for service
    Route::get('/service-page' , 'ServiceController@servicepage')->name('service.page');
    Route::post('create-service' , 'ServiceController@createservice')->name('service.create');
    Route::post('edit-service/{id}' , 'ServiceController@editservice')->name('service.edit');
    Route::get('feature-service-member/{id}' , 'ServiceController@featureservice')->name('service.feature');
    Route::get('delete-service-member/{id}' , 'ServiceController@deleteservice')->name('service.delete');

    // for projectP

    Route::get('/project-page' , 'ProjectController@projectpage')->name('project.page');
    Route::get('/project-page/{project}' , 'ProjectController@viewproject')->name('project.view');
    Route::get('/delete-project/{image}' , 'ProjectController@deleteProjectImage')->name('project.delete.image');
    Route::post('create-project' , 'ProjectController@createproject')->name('project.create');
    Route::post('edit-project/{project}' , 'ProjectController@editproject')->name('project.edit');
    Route::get('feature-project-member/{id}' , 'ProjectController@featureproject')->name('project.feature');
    Route::get('delete-project-member/{id}' , 'ProjectController@deleteproject')->name('project.delete');

    // for story

    Route::get('/story-page' , 'StoryController@storypage')->name('story.page');
    Route::post('create-story' , 'StoryController@createstory')->name('story.create');
    Route::post('edit-story/{id}' , 'StoryController@editstory')->name('story.edit');
    Route::get('feature-story-member/{id}' , 'StoryController@featurestory')->name('story.feature');
    Route::get('delete-story-member/{id}' , 'StoryController@deletestory')->name('story.delete');


    Route::get('/career-page' , 'CareerController@careerpage')->name('career.page');
    Route::post('create-career' , 'CareerController@createcareer')->name('career.create');
    Route::post('edit-career/{id}' , 'CareerController@editcareer')->name('career.edit');
    Route::get('feature-career-member/{id}' , 'CareerController@featurecareer')->name('career.feature');
    Route::get('delete-career-member/{id}' , 'CareerController@deletecareer')->name('career.delete');

    Route::get('/testimony-page' , 'TestimonyController@testimonyPage')->name('testimony.page');
    Route::post('create-testimony' , 'TestimonyController@createTestimony')->name('testimony.create');
    Route::post('edit-testimony/{id}' , 'TestimonyController@editTestimony')->name('testimony.edit');
    Route::get('feature-testimony-member/{id}' , 'TestimonyController@featureTestimony')->name('testimony.feature');
    Route::get('delete-testimony-member/{id}' , 'TestimonyController@deleteTestimony')->name('testimony.delete');

    // for photo

    Route::get('/photo-page' , 'PhotoController@photopage')->name('photo.page');
    Route::post('create-photo' , 'PhotoController@createphoto')->name('photo.create');
    Route::post('edit-photo/{id}' , 'PhotoController@editphoto')->name('photo.edit');
    Route::get('feature-photo/{id}' , 'PhotoController@featurephoto')->name('photo.feature');
    Route::get('delete-photo/{id}' , 'PhotoController@deletephoto')->name('photo.delete');

    // for video

    Route::get('/video-page' , 'VideoController@videopage')->name('video.page');
    Route::post('create-video' , 'VideoController@createvideo')->name('video.create');
    Route::post('edit-video/{id}' , 'VideoController@editvideo')->name('video.edit');
    Route::get('feature-video/{id}' , 'VideoController@featurevideo')->name('video.feature');
    Route::get('delete-video/{id}' , 'VideoController@deletevideo')->name('video.delete');




    Route::get('/partners-page' , 'PartnerController@partnerspage')->name('partners.page');
    Route::post('create-partner' , 'PartnerController@createPartner')->name('partner.create');
    Route::post('edit-partner/{id}' , 'PartnerController@editPartner')->name('partner.edit');
    Route::get('feature-partner/{id}' , 'PartnerController@featurepartner')->name('partner.feature');
    Route::get('delete-partner/{id}' , 'PartnerController@deletepartner')->name('partner.delete');

    Route::get('/publications-page' , 'PublicationController@publicationspage')->name('publications.page');
    Route::post('create-publication' , 'PublicationController@createPublication')->name('publication.create');
    Route::post('edit-publication/{id}' , 'PublicationController@editPublication')->name('publication.edit');
    Route::get('feature-publication/{id}' , 'PublicationController@featurePublication')->name('publication.feature');
    Route::get('delete-publication/{id}' , 'PublicationController@deletePublication')->name('publication.delete');

    Route::get('/events-page' , 'EventController@eventsPage')->name('events.page');
    Route::post('create-event' , 'EventController@createEvent')->name('event.create');
    Route::post('edit-event/{id}' , 'EventController@editEvent')->name('event.edit');
    Route::get('feature-event/{id}' , 'EventController@featureEvent')->name('event.feature');
    Route::get('delete-event/{id}' , 'EventController@deleteEvent')->name('event.delete');

    Route::get('/news-page' , 'NewsController@newsPage')->name('news.page');
    Route::post('create-news' , 'NewsController@createnews')->name('news.create');
    Route::post('edit-news/{id}' , 'NewsController@editnews')->name('news.edit');
    Route::get('feature-news/{id}' , 'NewsController@featurenews')->name('news.feature');
    Route::get('delete-news/{id}' , 'NewsController@deletenews')->name('news.delete');

    Route::get('/story-page' , 'StoryController@storyPage')->name('story.page');
    Route::post('create-story' , 'StoryController@createstory')->name('story.create');
    Route::post('edit-story/{id}' , 'StoryController@editstory')->name('story.edit');
    Route::get('feature-story/{id}' , 'StoryController@featurestory')->name('story.feature');
    Route::get('delete-story/{id}' , 'StoryController@deletestory')->name('story.delete');

    Route::get('/polls-page' , 'PollController@index')->name('polls.page');
    Route::post('create-poll' , 'PollController@store')->name('poll.create');
    Route::get('feature-poll/{poll}' , 'PollController@feature')->name('poll.feature');
    Route::get('unfeature-poll/{poll}' , 'PollController@unfeature')->name('poll.unfeature');
    Route::get('delete-poll/{poll}' , 'PollController@destroy')->name('poll.delete');


    Route::get('/tools-page' , 'ToolController@index')->name('tools.page');
    Route::post('create-tool' , 'ToolController@store')->name('tool.create');
    Route::post('edit-tool/{id}' , 'toolController@update')->name('tool.edit');
    Route::get('feature-tool/{tool}' , 'ToolController@feature')->name('tool.feature');
    Route::get('unfeature-tool/{tool}' , 'ToolController@unfeature')->name('tool.unfeature');
    Route::get('delete-tool/{tool}' , 'ToolController@destroy')->name('tool.delete');

    Route::get('/meetings-page' , 'meetingController@index')->name('meetings.page');
    Route::get('/meetings/{meeting}' , 'meetingController@show')->name('meeting.show');
    Route::post('create-meeting' , 'meetingController@store')->name('meeting.create');
    Route::post('edit-meeting/{id}' , 'meetingController@update')->name('meeting.edit');
    Route::get('feature-meeting/{id}' , 'meetingController@feature')->name('meeting.feature');
    Route::get('delete-meeting/{id}' , 'meetingController@destroy')->name('meeting.delete');

    // Route::post('create-photo' , 'PhotoController@store')->name('photo.create');
    // Route::get('feature-photo/{photo}' , 'PhotoController@feature')->name('meeting.photo.feature');
    // Route::get('delete-meeting-photo/{photo}' , 'PhotoController@destroy')->name('meeting.photo.destroy');


    // Route::get('/multimedia-page' , 'MultimediaController@multimediapage')->name('multimedia.page');
    // Route::post('add-image-gallry' , 'MultimediaController@imageUpload')->name('image.upload');
    // Route::get('feature-photo/{id}', 'MultimediaController@photoFeature')->name('photo.feature');
    // Route::get('delete-photo/{id}', 'MultimediaController@photoDelete')->name('photo.delete');


    Route::get('/contact-page' , 'ContactController@contactpage')->name('contact.page');
    Route::post('contact-update', 'ContactController@updateContact')->name('contact.update');

    Route::get('/program-page' , 'ProgramController@programpage')->name('program.page');



    Route::post('/create-slide/{page}' , 'SlideController@addSlide')->name('slide.create');
    Route::get('feature/{page}/{id}', 'SlideController@feature')->name('feature');
    Route::post('edit-slide/{page}/{id}', 'SlideController@editSlide')->name('slide.edit');
    Route::get('delete-slide/{page}/{id}', 'SlideController@deleteSlide')->name('slide.delete');


    Route::get('mark-as-read/{id}', 'MessageController@markAsRead')->name('message.read');
    Route::get('message/{id}', 'MessageController@messageShow')->name('message.show');
    Route::get('delete-message/{id}', 'MessageController@messageDelete')->name('message.delete');
    Route::get('message', 'MessageController@messageIndex')->name('message.all');


    	Route::get('blog', 'BlogController@index')->name('blog.index');
    	Route::post('blog', 'BlogController@store')->name('blog.store');
    	Route::patch('blog/{blog}', 'BlogController@update')->name('blog.update');
    	Route::delete('blog/{blog}', 'BlogController@destroy')->name('blog.destroy');
    	Route::get('blog-feature/{id}', 'BlogController@feature')->name('blog.feature');
    	Route::post('add-tags' , 'TagController@create')->name('tag.create');

});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login' , 'SessionController@showAdminForm')->name('admin.login');
    Route::post('/login' , 'SessionController@adminLogin')->name('admin.login.submit');
    Route::get('/logout' , 'SessionController@adminLogout')->name('admin.logout');
});
