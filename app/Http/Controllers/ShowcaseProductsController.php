<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Showcaseproduct;
use App\Product;
use App\Warehouse;
class ShowcaseProductsController extends Controller
{
     public function index()
    {
        $showcaseproducts = Showcaseproduct::select('*')
        ->leftJoin('products', 'showcaseproducts.product_id', '=', 'products.id')
        ->get();
        $products=Product::select('*')
        ->leftJoin('showcaseproducts', 'products.id', '=', 'showcaseproducts.product_id')
        ->get();
        return view('ShowcaseproductFile/list_showcaseproducts',['showcaseproducts'=>$showcaseproducts],
        	['products'=>$products]);
    }

    public function remove()
    {
    	$products=Product::select('*')->get();
    	return view('ShowcaseproductFile/remove_showcaseproducts',['products'=>$products]);
    }
    public function store(Request $request)
    {
    	$warehouse = Warehouse::where("product_id", $request->input('product_id'))->first();
    	$showcaseproduct = showcaseproduct::where("product_id", $request->input('product_id'))->first();
        $data=request()->validate([
            'product_id'=>'required',
            'amount_of_product_on_showcase'=>'required|numeric|min:0|not_in:0',
        ]);
        if ($warehouse->amount_of_product>=$request->input('amount_of_product_on_showcase')) {
        	 $warehouse = Warehouse::where("product_id", $request->input('product_id'))->first();
        $showcaseproduct->amount_of_product_on_showcase=$request->input('amount_of_product_on_showcase')+ $showcaseproduct->amount_of_product_on_showcase;
        $warehouse->amount_of_product=$warehouse->amount_of_product-$request->input('amount_of_product_on_showcase');
        $showcaseproduct->push();
        $warehouse->push();
        return redirect('/showcaseproducts');
    }
    else{
            return redirect()->back() ->with('alert', 'Не хватает продукта на складе для перемещения на витрину');
        }
    }
}
