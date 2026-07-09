<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;


class PurchaseController extends Controller
{

    public function index()
    {

        $purchases = Purchase::orderBy(
            'purchase_date',
            'desc'
        )->get();


        return view(
            'purchases.index',
            compact('purchases')
        );

    }



    public function create()
    {

        return view(
            'purchases.create'
        );

    }



    public function store(Request $request)
    {

        $data = $request->validate([

            'purchase_date'
                => 'required|date',

            'notes'
                => 'nullable|string'

        ]);



        $purchase = Purchase::create([

    'purchase_date'
        => $data['purchase_date'],

    'notes'
        => $data['notes'] ?? null,

    'total'
        => 0

]);



        return redirect()
    ->route('purchases.show',$purchase);

    }



    public function show(Purchase $purchase)
    {

        return view(
            'purchases.show',
            compact('purchase')
        );

    }


}