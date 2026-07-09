<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Finance;

class DashboardController extends Controller
{

    public function index()
    {


        $products = Product::count();


        $stores = Store::count();


        $customers = Customer::count();



        $sales = Sale::count();



        $totalInvestment = Finance::sum('investment');



        $totalRecovery = Finance::sum('manual_recovery');



        $profit = 
            $totalRecovery - $totalInvestment;



        return view('dashboard', compact(

            'products',
            'stores',
            'customers',
            'sales',
            'totalInvestment',
            'totalRecovery',
            'profit'

        ));


    }

}