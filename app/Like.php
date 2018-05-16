<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $fillable =['user_id', 'book_id'];
	
    public function user()
    {
    	return belingsTo(User::class);
    }
}
