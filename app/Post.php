<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // table name
    //specify fields
    
    protected $table = 'posts';

    // primary key
    public $primaryKey = 'id';

    //timestamp
    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User');
    	//a post has a relasionship with a user 
    	//and single post belongs to a user
    }
}
