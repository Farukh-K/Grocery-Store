<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    public function Strings_of_checks()
    {
    	return $this->hasMany(\App\Strings_of_check);
    }
}
