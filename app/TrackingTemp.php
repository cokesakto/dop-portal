<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingTemp extends Model
{
    protected $table = 'joblist_hdr_tmp';

    // primary key
    public $primaryKey = 'tdn';

    //for primarykey not int
    public $incrementing = false; 
}
