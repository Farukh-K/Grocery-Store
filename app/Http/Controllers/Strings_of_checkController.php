<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Product;
use App\Showcaseproduct;
use App\Strings_of_check;
use App\Check;
use Illuminate\Http\Request;

class Strings_of_checkController extends Controller
{
   public function store(Request $request)
    {
        $data=request()->validate([
            'product_id'=>'required',
            'amount_of_product'=>'required|numeric|min:0|not_in:0',
        ]);
        $products_in_check=new Strings_of_check;
        $products_in_check->product_id=$request->input('product_id');
        $products_in_check->amount_of_product_in_check=$request->input('amount_of_product_in_check');
        $products_in_check->check_id=Check::latest()->first()->id;
        $products_in_check->save();

    }
}
