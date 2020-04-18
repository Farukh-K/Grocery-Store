<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Warehouse;
use App\Showcaseproduct;
class ProductsController extends Controller
{
    public function index()
    {
    	$products = Product::select('*')->get();
        return view('ProductFile/list_products',['products' => $products]);
    }

    public function create()
    {
    	return view('ProductFile.add_products');
    }

    public function store(Request $request)
    {
    	$data=request()->validate([
    		'name_of_product'=>'required',
    		'unit_of_measure'=>'required',
    		'price_of_the_product'=>'required',
    	]);
        \App\Product::create($data);
        $warehouse=new Warehouse;
        $warehouse->product_id=Product::latest()->first()->id;
        $warehouse->amount_of_product=0;
        $showcaseproduct=new Showcaseproduct;
        $showcaseproduct->product_id=Product::latest()->first()->id;
        $showcaseproduct->amount_of_product_on_showcase=0;
        $warehouse->save();
        $showcaseproduct->save();
        return redirect('/products');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
