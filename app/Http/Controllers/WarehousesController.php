<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use App\Product;
use Illuminate\Database\Eloquent\Model;
class WarehousesController extends Controller
{
     public function index()
    {
        $warehouses = Warehouse::select('*')
        ->leftJoin('products', 'warehouses.product_id', '=', 'products.id')
        ->get();
        $products=Product::select('*')
        ->leftJoin('warehouses', 'products.id', '=', 'warehouses.product_id')
        ->get();
        return view('WarehouseFile/list_warehouse',['warehouses'=>$warehouses],
        	['products'=>$products]);
    }
    public function create()
    {
        $products=Product::select('*')->get();
        return view('WarehouseFile.add_warehouse',['products'=>$products]);
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'product_id'=>'required',
            'amount_of_product'=>'required|numeric|min:0|not_in:0',
        ]);
        $warehouse = Warehouse::where("product_id", $request->input('product_id'))->first();
        $firstperem=$request->input('amount_of_product');
        $secondperem=$warehouse->amount_of_product;
        $result=$firstperem+$secondperem;
        $warehouse->amount_of_product=$result;
        $warehouse->push();
        return redirect('/warehouses');
    }
        public function edit(Warehouse $warehouse)
    {
        $products = Product::select('*')->get();

        return view('WarehouseFile.add_warehouse',['warehouse'=>$warehouse],['product'=>$product]);
    }
    public function update(Request $request, Course $course)
    {
        // var_dump($request->all());
        Product::update($request->except(['_token', '_method']) )->where('id', $course->id);

         return redirect('warehouses');
    }
}
