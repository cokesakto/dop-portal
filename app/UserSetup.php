<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetup extends Model
{
    protected $table = 'users';

    // primary key
    public $primaryKey = 'id';

    //timestamp
    public $timestamps = true;


}
