<?php

namespace App\Http\Controllers;
use App\Warehouse;
use App\Product;
use App\Showcaseproduct;
use App\Strings_of_check;
use App\Check;
use Illuminate\Http\Request;

class ChecksController extends Controller
{


    public function createcheck()
    {
        $check=new Check;
        $check->save();
        $showcaseproducts = Showcaseproduct::select('*')
        ->leftJoin('products', 'showcaseproducts.product_id', '=', 'products.id')
        ->get();
        $products=Product::select('*')
        ->leftJoin('showcaseproducts', 'products.id', '=', 'showcaseproducts.product_id')
        ->get();
        $products_in_check=Strings_of_check::select('*')
        ->leftJoin('products', 'strings_of_checks.product_id', '=', 'products.id')
        ->get();
        return view('checksFile/create_check',['products_in_check'=>$products_in_check,'showcaseproducts'=>$showcaseproducts],
        	['products'=>$products]);
    }


       public function store(Request $request)
    {
        $data=request()->validate([
            'product_id'=>'required',
            'amount_of_product_in_check'=>'required|numeric|min:0|not_in:0',
            'price_of_product'=>'',
        ]);
         $showcaseproduct=Showcaseproduct::where("product_id",$request->input('product_id'))->first();
        if ($showcaseproduct->amount_of_product_on_showcase>=$request->input('amount_of_product_in_check'))
        {
        $product = Product::where("id", $request->input('product_id'))->first();
        $products_in_check=new Strings_of_check;
        $products_in_check->product_id=$request->input('product_id');
        $products_in_check->amount_of_product_in_check=$request->input('amount_of_product_in_check');
        $products_in_check->price_of_product=$products_in_check->amount_of_product_in_check*$product->price_of_the_product;
        $products_in_check->check_id=Check::latest()->first()->id;
        $products_in_check->save();
        return redirect('/check/addproducts');
        }
        else
        {
            return redirect('/check/addproducts') ->with('alert', 'Ошибка ввода!');
        }
    }




        public function addprod()
    {
        $latest_product_id=Strings_of_check::latest()->first()->product_id;
        $latest_product_amount=Strings_of_check::latest()->first()->amount_of_product_in_check;
        $check=Check::latest()->first()->id;
        $showcaseproduct=Showcaseproduct::where("product_id",$latest_product_id)->first();
        if ($showcaseproduct->amount_of_product_on_showcase>=$latest_product_amount)
        {
        $showcaseproduct->amount_of_product_on_showcase=$showcaseproduct->amount_of_product_on_showcase-$latest_product_amount;
        $showcaseproduct->push();


        $products=Product::select('*')
        ->leftJoin('showcaseproducts', 'products.id', '=', 'showcaseproducts.product_id')
        ->get();
        $products_in_check=Strings_of_check::select('*')
        ->leftJoin('products', 'strings_of_checks.product_id', '=', 'products.id')->where("check_id",$check)
        ->get();
        return view('checksFile/addproducts_check',['products_in_check'=>$products_in_check],
            ['products'=>$products]);
    }
    else
        {
            return redirect()->back() ->with('alert', 'Ошибка ввода');
        }

    }
    // public function remove_productsbycheck()
    // {
    //     $check=Check::latest()->first()->id;
    //     $products_in_check=Strings_of_check::where("check_id",$check);
    //     $showcaseproducts=Showcaseproduct::where("product_id",)->first();
    // }
}
