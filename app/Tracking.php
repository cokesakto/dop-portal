<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'joblist_hdr';

    // primary key
    public $primaryKey = 'tdn';

    //for primarykey not int
    public $incrementing = false; 

}
