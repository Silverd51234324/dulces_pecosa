<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('active', true)
            ->orderBy('display_order')
            ->get();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
{

    $data = $request->validate([

        'name' => 'required|string|max:100',

        'type' => 'required|string',

        'purchase_amount' => 'required|numeric',

        'purchase_unit' => 'required|string',

        'purchase_price' => 'required|numeric',

        'unit_quantity' => 'required|numeric',

        'unit_unit' => 'required|string',

        'production_yield' => 'required|numeric',

        'unit_cost' => 'required|numeric',

        'sale_price' => 'required|numeric',

        'profit' => 'required|numeric',

    ]);


    Product::create($data);


    return redirect()
        ->route('products.index')
        ->with('success','Producto agregado correctamente');

}



    public function edit(Product $product)
    {
        return view(
            'products.edit',
            compact('product')
        );
    }



    public function update(Request $request, Product $product)
{

    $data = $request->validate([

        'name' => 'required|string|max:100',

        'type' => 'required|string',

        'purchase_amount' => 'required|numeric',

        'purchase_unit' => 'required|string',

        'purchase_price' => 'required|numeric',

        'unit_quantity' => 'required|numeric',

        'unit_unit' => 'required|string',

        'production_yield' => 'required|numeric',

        'unit_cost' => 'required|numeric',

        'sale_price' => 'required|numeric',

        'profit' => 'required|numeric',

    ]);


    $product->update($data);


    return redirect()
        ->route('products.index')
        ->with('success','Producto actualizado');

}



    public function destroy(Product $product)
    {

        $product->update([
            'active' => false
        ]);


        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado');
    }

}