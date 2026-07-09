<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreVisit;
use App\Models\StoreVisitDetail;
use Illuminate\Http\Request;

class StoreVisitController extends Controller
{


    public function create(Request $request)
{

    $stores = Store::all();

    $selectedStore = null;


    if($request->store)
    {

        $selectedStore = Store::find(
            $request->store
        );

    }


    return view(
        'store_visits.create',
        compact(
            'stores',
            'selectedStore'
        )
    );

}



    public function store(Request $request)
    {

        $data = $request->validate([

            'store_id'
                => 'required|exists:stores,id',

            'visit_date'
                => 'required|date',

        ]);



        $visit = StoreVisit::create($data);



        return redirect()
            ->route(
                'store-visits.show',
                $visit
            );

    }




    public function show(StoreVisit $storeVisit)
{

    $storeVisit->load([
        'store.products.product',
        'details.product'
    ]);


    return view(
        'store_visits.show',
        compact('storeVisit')
    );

}

    public function update(Request $request, StoreVisit $storeVisit)
{

    foreach($request->products as $product)
    {


        StoreVisitDetail::create([

            'store_visit_id'
                => $storeVisit->id,


            'product_id'
                => $product['product_id'],


            'supplied_quantity'
                => $product['supplied'],


            'remaining_quantity'
                => $product['remaining'],


            'sold_quantity'
                => $product['supplied']
                -
                $product['remaining']

        ]);


    }



    return redirect()
        ->route(
            'store-visits.show',
            $storeVisit
        );

}

public function destroy(StoreVisit $storeVisit)
{

    $storeVisit->details()->delete();


    $storeVisit->delete();


    return redirect()

        ->back()

        ->with('success','Visita eliminada correctamente');

}

}