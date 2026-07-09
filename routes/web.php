<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreProductController;
use App\Http\Controllers\StoreVisitController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class,'index'])
    ->name('dashboard');




Route::resource(
    'products',
    ProductController::class
);

Route::resource(
    'purchases',
    PurchaseController::class
);

Route::post(
    'purchases/{purchase}/details',
    [PurchaseDetailController::class,'store']
)
->name('purchase_details.store');

Route::resource(
    'stores',
    StoreController::class
);

Route::post(
    'stores/{store}/products',
    [StoreProductController::class,'store']
)
->name('store_products.store');



Route::delete(
    'stores/{store}/products/{storeProduct}',
    [StoreProductController::class,'destroy']
)
->name('store_products.destroy');

Route::get(
    'stores/{store}',
    [StoreController::class,'show']
)
->name('stores.show');

Route::resource(
    'store-visits',
    StoreVisitController::class
);

Route::resource(
    'customers',
    CustomerController::class
);

Route::resource(
    'sales',
    SaleController::class
);

Route::resource(
    'finances',
    FinanceController::class
);