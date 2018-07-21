<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingDetails extends Model
{
    protected $table = 'joblist_dtl';

    // primary key
    public $primaryKey = 'tdn';

    //for primarykey not int
    public $incrementing = false; 
}
