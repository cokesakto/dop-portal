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
Route::resource('/trucking', 'TrackingController');
Route::get('/trackingsearch', 'TrackingController@trackSearch');
Route::get('/trackingSearchResult', 'TrackingController@trackSearchResult');
Route::get('/trackingClientView/{id}', 'TrackingController@trackSearchResultClientView');

//Route::get('/ajax', 'TrackingController@ajax')->name('ajax');
//Route::get('/tracking', 'TrackingController@index');
//Route::get('/tracking/{$id}', 'TrackingController@show');



Route::get('/serverSideTracking', [
    'as'   => 'serverSideTracking',
    'uses' => function () {
       // $tracks = App\Tracking::select(['tdn','transportmode','shipper','booking','bill_of_ladding','status']);
       // dd(auth()->user()->role);
        $role = auth()->user()->role;
        $company_code = auth()->user()->company_code;
        if($role=='Trucking'){
            $tracks =  DB::table('joblist_hdr')->select('tdn','transportmode','shipper','pickup_date','consignee','delivery_date','status')->where('truckercode', "{$company_code}")->get(); //
            return Datatables::of($tracks)
            ->addColumn('view', '<a href="/trucking/{{$tdn}}" class="btn btn-default">View</a>')
            ->make();
        }else{
            $tracks =  DB::table('joblist_hdr')->select('tdn','transportmode','shipper','pickup_date','consignee','delivery_date','status')->get(); //
            return Datatables::of($tracks)
            ->addColumn('view', '<a href="/trucking/{{$tdn}}" class="btn btn-default">View</a>')
            ->make();
        }    
    }
]);


Route::get('truckingupload', 'MaatwebsiteDemoController@trackingupload');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('truckingImportExcel', 'MaatwebsiteDemoController@importExcel');


Route::resource('/usersetup', 'UsersSetupController');
Route::get('/serverSideUsers', [
    'as'   => 'serverSideUsers',
    'uses' => function () {

        $users = App\UserSetup::select(['id','email','name','role','company_code']);

        return Datatables::of($users)
        ->addColumn('view', '<a href="usersetup/{{$id}}" class="btn btn-default">View</a>&nbsp;&nbsp;<a href="usersetup/{{$id}}/edit" class="btn btn-default">Edit</a>')
      
        ->make();
    }
]);

Route::resource('/kendo', 'KendoController');
Route::get('/kendoviewlist', 'KendoController@viewlist');

Route::resource('/truckersetup', 'TruckersController');
Route::get('/serverSideTruckers', [
    'as'   => 'serverSideTruckers',
    'uses' => function () {

        $truckers = App\Truckers::select(['id','code as codes','description']);

        return Datatables::of($truckers)
        ->addColumn('view', '<a href="truckersetup/{{$id}}/edit" class="btn btn-default">Edit</a>')
      
        ->make();
    }
]);

