<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChecksController extends Controller
{
    public function create()
    {
        $showcaseproducts = Showcaseproduct::select('*')
        ->leftJoin('products', 'showcaseproducts.product_id', '=', 'products.id')
        ->get();
        $products=Product::select('*')
        ->leftJoin('showcaseproducts', 'products.id', '=', 'showcaseproducts.product_id')
        ->get();
        return view('checksFile/add_check',['showcaseproducts'=>$showcaseproducts],
        	['products'=>$products]);
    }
}
