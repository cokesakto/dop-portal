<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracking;
use App\TrackingDetails;
use DB;

class TrackingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['trackView','trackSearch','trackSearchResult']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$tracks = Tracking::orderBy('tdn', 'asc')->paginate(10);  
        //return view('tracking.index')->with('tracks',$tracks);

       // $tracks = Tracking::select('tdn','date');
        return view('tracking.index');//->with('tracks',$tracks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trackshdr = Tracking::find($id);
        //return view('tracking.show')->with('tracks',$tracks);

       
        $query = "SELECT path from joblist_dtl where tdn='{$id}' order by type desc";
        $tracksdtl = DB::select($query);

      //x  return $tracksdtl = TrackingDetails::find($id);

      //  return view('tracking.show')->with('trackshdr',$trackshdr)->with('tracksdtl', $tracksdtl);
        return view('tracking.show')->with('trackshdr',$trackshdr)->with('tracksdtl', $tracksdtl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajax()
    {
        return view('tracking.ajax-index');
    }

    public function index2()
    {
        $tracks = Tracking::all();
        return view('tracking.index2')->with('tracks',$tracks);
    }

    public function trackSearch()
    {
       // $tracks = Tracking::find($id);
       // return view('tracking.tracksearch')->with('trackshdr',$tracks);
        return view('tracking.tracksearch');
    }


    public function trackSearchResult(Request $request)
    {
        $search = $request->id;  
       // $trackshdr = Tracking::find($search);

        $trackshdr = Tracking::where('tdn',"{$search}")->get();
                          
//echo $trackshdr;
        return view('tracking.tracksearchresult')->with('trackshdr',$trackshdr);
    }
}
