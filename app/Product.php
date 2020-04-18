<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    public function warehouse()
    {
    	return $this->belongsTo(\App\Warehouse::class,"product_id");
    }
}
