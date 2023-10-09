<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::latest()->paginate(5);
        return view('product', compact('products'));
    }

    //add product
    public function addProduct(Request $request)
    {
        $request->validate(
                [
                    'name' => 'required|unique:products',
                    'price' => 'required'
                ],
                [
                    'name.required' => 'Name is required',
                    'name.unique' => 'Product name is already exist',
                    'price.required' => 'Product price is required'
                ]
        );

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    //update product
    public function updateProduct(Request $request)
    {
        $request->validate(
                [
                    'update_name' => 'required|unique:products,name,'.$request->update_id,
                    'update_price' => 'required'
                ],
                [
                    'update_name.required' => 'Name is required',
                    'update_name.unique' => 'Product name is already exist',
                    'update_price.required' => 'Product price is required'
                ]
        );

        Product::where('id', $request->update_id)->update([
            'name' => $request->update_name,
            'price' => $request->update_price,
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
