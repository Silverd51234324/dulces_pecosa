<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductionController extends Controller
{


    public function index()
    {

        $productions = Production::with('product')
            ->orderBy('created_at','desc')
            ->get();


        return view(
            'productions.index',
            compact('productions')
        );

    }



    public function create()
    {

        $products = Product::where(
            'active',
            true
        )->get();


        return view(
            'productions.create',
            compact('products')
        );

    }



    public function store(Request $request)
    {


        $data = $request->validate([


            'product_id'
                => 'required|exists:products,id',


            'input_quantity'
                => 'required|numeric',


            'input_unit'
                => 'required|string',


            'output_quantity'
                => 'required|numeric',


            'output_unit'
                => 'required|string',


            'cost'
                => 'required|numeric',


            'sale_price'
                => 'required|numeric',

        ]);



        Production::create($data);



        return redirect()
            ->route('productions.index')
            ->with(
                'success',
                'Preparación registrada'
            );

    }



    public function show(Production $production)
    {
        //
    }



    public function edit(Production $production)
{
    $products = Product::all();

    return view(
        'productions.edit',
        compact('production','products')
    );
}



    public function update(Request $request, Production $production)
{

    $data = $request->validate([

        'product_id'=>'required',
        'input_quantity'=>'required|numeric',
        'input_unit'=>'required',
        'output_quantity'=>'required|numeric',
        'output_unit'=>'required',
        'cost'=>'required|numeric',
        'sale_price'=>'required|numeric',

    ]);


    $production->update($data);


    return redirect()
        ->route('productions.index');

}



    public function destroy(Production $production)
{

    $production->delete();


    return redirect()
        ->route('productions.index');

}


}