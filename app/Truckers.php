<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truckers extends Model
{
    protected $table = 'truckers';

    // primary key
    public $primaryKey = 'id';

    //timestamp
    public $timestamps = true;
}
