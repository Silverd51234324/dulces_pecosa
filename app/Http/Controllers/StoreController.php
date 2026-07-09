<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Product;


class StoreController extends Controller
{


    public function index()
    {

        $stores = Store::orderBy('name')
            ->get();


        return view(
            'stores.index',
            compact('stores')
        );

    }



    public function create()
    {

        return view(
            'stores.create'
        );

    }

    public function show(Store $store)
{

    $products = Product::where(
        'active',
        true
    )->get();


    $store->load([
        'products.product',
        'visits.details.product'
    ]);


    return view(
        'stores.show',
        compact(
            'store',
            'products'
        )
    );

}




    public function store(Request $request)
    {


        $data = $request->validate([

            'name'
                => 'required|string|max:255',

            'notes'
                => 'nullable|string'

        ]);



        Store::create($data);



        return redirect()
            ->route('stores.index')
            ->with(
                'success',
                'Tienda creada correctamente'
            );

    }




    public function edit(Store $store)
    {

        return view(
            'stores.edit',
            compact('store')
        );

    }





    public function update(Request $request, Store $store)
    {


        $data = $request->validate([

            'name'
                => 'required|string|max:255',

            'notes'
                => 'nullable|string'

        ]);



        $store->update($data);



        return redirect()
            ->route('stores.index');
            

    }





    public function destroy(Store $store)
    {

        $store->delete();


        return back();

    }


}