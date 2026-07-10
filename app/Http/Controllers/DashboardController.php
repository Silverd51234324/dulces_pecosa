<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Finance;
use App\Models\SaleDetail;

class DashboardController extends Controller
{

    public function index()
    {


        // Cantidades generales

        $products = Product::where('active',true)
            ->count();



        $stores = Store::count();



        $customers = Customer::count();



        $sales = Sale::count();





        // Finanzas manuales

        $totalInvestment = Finance::sum(
            'investment'
        );



        $totalRecovery = Finance::sum(
            'manual_recovery'
        );



        $profit = 
            $totalRecovery - $totalInvestment;







        // Ventas reales a clientes


        $totalSales = SaleDetail::sum(
            \DB::raw(
                'quantity * price'
            )
        );





        // Ganancia estimada

        $totalProfit = SaleDetail::join(
                'products',
                'sale_details.product_id',
                '=',
                'products.id'
            )
            ->selectRaw(
                'SUM(
                    sale_details.quantity *
                    (sale_details.price - products.unit_cost)
                ) as total'
            )
            ->value('total') ?? 0;







        // Cantidad total vendida


        $productsSold = SaleDetail::sum(
            'quantity'
        );







        return view(
            'dashboard',
            compact(

                'products',

                'stores',

                'customers',

                'sales',


                'totalInvestment',

                'totalRecovery',

                'profit',


                'totalSales',

                'totalProfit',

                'productsSold'

            )
        );


    }

}