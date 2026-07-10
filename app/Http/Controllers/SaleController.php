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

        $customers = Customer::orderBy('name')
            ->get();


        $products = Product::where(
            'active',
            true
        )
        ->orderBy('name')
        ->get();



        return view(
            'sales.create',
            compact(
                'customers',
                'products'
            )
        );

    }




    /*
    |--------------------------------------------------------------------------
    | Crear venta desde cliente
    |--------------------------------------------------------------------------
    */

    public function createForCustomer(Customer $customer)
    {


        $products = Product::where(
            'active',
            true
        )
        ->orderBy('name')
        ->get();



        return view(
            'sales.create_customer',
            compact(
                'customer',
                'products'
            )
        );

    }






    public function storeForCustomer(
        Request $request,
        Customer $customer
    )
    {


        $data = $request->validate([


            'sale_date'
                => 'required|date',


            'products'
                => 'required|array',


            'products.*.product_id'
                => 'required|exists:products,id',


            'products.*.quantity'
                => 'required|numeric|min:1',


            'products.*.price'
                => 'required|numeric|min:0',


        ]);





        $sale = Sale::create([


            'customer_id'
                => $customer->id,


            'sale_date'
                => $data['sale_date']


        ]);







        foreach($data['products'] as $item)
        {


            $sale->details()->create([


                'product_id'
                    => $item['product_id'],


                'quantity'
                    => $item['quantity'],


                'price'
                    => $item['price']


            ]);


        }





        return redirect()

            ->route(
                'customers.show',
                $customer
            )

            ->with(
                'success',
                'Venta registrada correctamente'
            );


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


public function edit(Sale $sale)
{

    $sale->load([
        'customer',
        'details.product'
    ]);


    $products = Product::where(
        'active',
        true
    )
    ->orderBy('name')
    ->get();



    return view(
        'sales.edit',
        compact(
            'sale',
            'products'
        )
    );

}





public function update(Request $request, Sale $sale)
{

    $data = $request->validate([


        'sale_date'
            => 'required|date',



        'products'
            => 'required|array',



        'products.*.product_id'
            => 'required|exists:products,id',



        'products.*.quantity'
            => 'required|numeric|min:1',



        'products.*.price'
            => 'required|numeric|min:0',


    ]);




    $sale->update([

        'sale_date'
            => $data['sale_date']

    ]);



    // borrar productos anteriores

    $sale->details()->delete();




    foreach($data['products'] as $item)
    {


        $sale->details()->create([


            'product_id'
                => $item['product_id'],


            'quantity'
                => $item['quantity'],


            'price'
                => $item['price']


        ]);


    }





    return redirect()

        ->route(
            'customers.show',
            $sale->customer
        )

        ->with(
            'success',
            'Venta actualizada correctamente'
        );


}







public function destroy(Sale $sale)
{

    $customer = $sale->customer;


    $sale->delete();



    return redirect()

        ->route(
            'customers.show',
            $customer
        )

        ->with(
            'success',
            'Venta eliminada correctamente'
        );


}


}