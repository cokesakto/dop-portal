<?php

namespace App\Http\Controllers;

use App\Tracking;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getTracks()
    {

       // $query = Tracking::select('tdn', 'date');

        //return datatables($query)->make(true);


        return datatables(User::query('select * from joblist_hdr where 1'))->toJson();
    }

}
