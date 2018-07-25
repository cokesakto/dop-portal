<?php

use Yajra\Datatables\Datatables;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/hello', function () {
    return '<h1>Hello World!!!</h1>';
});

//dynamic entry
Route::get('/users/{id}/{name}', function ($id,$name) {
    return "<h1>This is user {$name} with id no. {$id}</h1>";
});*/

/* go to app/http/controller/pagescontroler.php and function index */
Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );

Route::resource('posts', 'PostsController');
 	
/*Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/services', function () {
    return view('pages.services');
});*/


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::resource('/tracking', 'TrackingController');
Route::get('/trackingsearch', 'TrackingController@trackSearch');
Route::get('/trackingSearchResult', 'TrackingController@trackSearchResult');
Route::get('/trackingClientView/{id}', 'TrackingController@trackSearchResultClientView');

//Route::get('/ajax', 'TrackingController@ajax')->name('ajax');
//Route::get('/tracking', 'TrackingController@index');
//Route::get('/tracking/{$id}', 'TrackingController@show');



Route::get('/serverSideTracking', [
    'as'   => 'serverSideTracking',
    'uses' => function () {
      //  $tracks = App\Tracking::select('tdn','date','del_address','status');
        $tracks = App\Tracking::select(['tdn','refno','date','del_address','status']);

        return Datatables::of($tracks)
        ->addColumn('view', '<a href="/tracking/{{$tdn}}" class="btn btn-default">View</a>')
        ->make();
    }
]);
