<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class StoreProductController extends Controller
{


    public function store(Request $request, Store $store)
    {


        $data = $request->validate([

            'product_id'
                => 'required|exists:products,id',

            'assigned_quantity'
                => 'required|numeric'

        ]);



        StoreProduct::create([

            'store_id'
                => $store->id,

            'product_id'
                => $data['product_id'],

            'assigned_quantity'
                => $data['assigned_quantity']

        ]);



        return back();

    }




    public function destroy(Store $store, StoreProduct $storeProduct)
{

    $storeProduct->delete();


    return redirect()

        ->route('stores.show',$store)

        ->with('success','Producto eliminado de la tienda');

}


}