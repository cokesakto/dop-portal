<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSetup;
use App\Truckers;
use DB;

class UsersSetupController extends Controller
{

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
            return view('users.index'); 
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
            $query = "SELECT code,description from truckers where 1 order by code asc";
            $truckers = DB::select($query);
            return view('users.create')->with('truckers',$truckers);
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
                'full_name' => 'required',
                'password' => 'required|min:5',
                'confirm_password' => 'required|min:5|same:password',
                'email' => 'required|email|unique:users',
                'role' => 'required',
                'company' => 'required',
            ]);

            $user = new UserSetup;
            $user->name = $request->input('full_name');
            $user->password = bcrypt($request->input('password'));
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->company_code = $request->input('company');
            $user->created_by = auth()->user()->id;
            $user->save();

            return redirect('/usersetup')->with('success', 'User Created');
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
        if(auth()->user()->role==config('constants.role_trucking') or auth()->user()->role==''){ 
            return view('tracking.showerror')->with('error','Unauthorized Access');
        }else{
            $user = UserSetup::find($id);

            $query = "SELECT description from truckers where code='{$user->company_code}'";
            $truckers = DB::select($query);
            //dd($truckers);
            return view('users.show')->with('user',$user)->with('truckers',$truckers);
        }    
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
            $user = UserSetup::find($id);

            $query = "SELECT code,description from truckers where 1 order by code asc";
            $truckers = DB::select($query);

            return view('users.edit')->with('user',$user)->with('truckers',$truckers);   
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
                'role' => 'required',
                'company' => 'required',
               
            ]);

            if (isset($request->chkPwd)) {
                $this->validate($request, [
                    'password' => 'required|min:5',
                    'confirm_password' => 'required|min:5|same:password',
                ]);
            }

            $user = UserSetup::find($id);
            $user->role = $request->input('role');
            $user->company_code = $request->input('company');

            if (isset($request->chkPwd)) {
                $user->password = bcrypt($request->input('password'));
            } 

            $user->save();

            return redirect('/usersetup')->with('success', 'User Updated');
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
