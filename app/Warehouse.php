<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	protected $guarded=[];
    public function products()
    {
    	return $this->hasMany(\App\Product::class,"id");
    }
}
