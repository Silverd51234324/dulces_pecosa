<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{


    public function store(Request $request, Purchase $purchase)
    {


        $data = $request->validate([


            'product_id'
                => 'required|exists:products,id',


            'quantity'
                => 'required|numeric',


            'unit'
                => 'required|string',


            'unit_price'
                => 'required|numeric',


        ]);



        $subtotal =
            $data['quantity']
            *
            $data['unit_price'];



        PurchaseDetail::create([


            'purchase_id'
                => $purchase->id,


            'product_id'
                => $data['product_id'],


            'quantity'
                => $data['quantity'],


            'unit'
                => $data['unit'],


            'unit_price'
                => $data['unit_price'],


            'subtotal'
                => $subtotal,


        ]);




        $purchase->update([

            'total'
                =>
                $purchase->details()
                ->sum('subtotal')

        ]);



        return back();

    }


}