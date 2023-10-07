<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        return view('product');
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
    }
}
