<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truckers;
use DB;

class TruckersController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{
            return view('truckers.index'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{
            return view('truckers.create');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{
            $this->validate($request, [
                'code' => 'required',
                'name' => 'required',
            ]);

            $truckers = new Truckers;
            $truckers->code = strtoupper($request->input('code'));
            $truckers->description = $request->input('name');
            $truckers->created_by = auth()->user()->id;
            $truckers->save();

            return redirect('/truckersetup')->with('success', 'User Created');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{

            $truckers = Truckers::find($id);

            return view('truckers.edit')->with('truckers',$truckers);   
        }    
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
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{

            $this->validate($request, [
                'description' => 'required',
               
            ]);

            if($id!=''){
                $truckers = Truckers::find($id);
                $truckers->description = $request->input('description');
                $truckers->save();
            }        
            return redirect('/truckersetup')->with('success', 'User Updated');
        } 
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
}
