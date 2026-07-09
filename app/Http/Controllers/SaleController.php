<?php

namespace App\Http\Controllers;


use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;



class SaleController extends Controller
{


    public function index()
    {

        $sales = Sale::with([
    'customer',
    'details'
])
->orderByDesc('sale_date')
->get();


        return view(
            'sales.index',
            compact('sales')
        );

    }




    public function create()
    {

        $customers = Customer::all();

        $products = Product::where(
            'active',
            true
        )->get();



        return view(
            'sales.create',
            compact(
                'customers',
                'products'
            )
        );

    }

    public function store(Request $request)
{

    $data = $request->validate([

        'customer_id'
            => 'required|exists:customers,id',

        'products'
            => 'required|array'

    ]);



    $sale = Sale::create([

        'customer_id'
            => $data['customer_id'],

        'sale_date'
            => now()

    ]);



    foreach($data['products'] as $product_id => $quantity)
    {


        if($quantity > 0)
        {

            $product = Product::find($product_id);


            $sale->details()->create([

                'product_id'
                    => $product->id,

                'quantity'
                    => $quantity,

                'price'
                    => $product->sale_price

            ]);

        }

    }



    return redirect()
        ->route('sales.index');


}

public function show(Sale $sale)
{

    $sale->load([
        'customer',
        'details.product'
    ]);


    return view(
        'sales.show',
        compact('sale')
    );

}



}