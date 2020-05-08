<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strings_of_check extends Model
{
	 protected $guarded=[];
    public function Check()
    {
    	return $this->belongsTo(Check::class);
    }
}
