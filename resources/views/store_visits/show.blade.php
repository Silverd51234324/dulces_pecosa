@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">


    <div class="mb-6">

        <a href="{{ route('stores.show',$storeVisit->store) }}"
           class="text-slate-400 hover:text-white">

            ← Volver a tienda

        </a>


        <h1 class="text-3xl font-bold text-white mt-3">

            📝 Visita - {{ $storeVisit->store->name }}

        </h1>


        <p class="text-slate-300 mt-2">

            Fecha:
            {{ $storeVisit->visit_date }}

        </p>


    </div>





@if($storeVisit->details->count() == 0)


    <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6">


        <h2 class="text-xl font-bold text-white mb-5">

            📦 Conteo de productos

        </h2>



        <form action="{{ route('store-visits.update',$storeVisit) }}"
              method="POST">

            @csrf
            @method('PUT')



            <div class="overflow-hidden rounded-lg border border-slate-700">


                <table class="w-full text-slate-200">


                    <thead>

                        <tr class="bg-slate-700 border-b border-slate-600">


                            <th class="p-4 text-left">

                                Producto

                            </th>


                            <th class="p-4 text-center">

                                Surtido

                            </th>


                            <th class="p-4 text-center">

                                Restante

                            </th>


                        </tr>

                    </thead>



                    <tbody>


                    @foreach($storeVisit->store->products as $item)


                        <tr class="border-b border-slate-700 hover:bg-slate-700 transition">


                            <td class="p-4">


                                {{ $item->product->name }}


                                <input
                                    type="hidden"
                                    name="products[{{ $item->product->id }}][product_id]"
                                    value="{{ $item->product->id }}">


                            </td>




                            <td class="text-center">


                                {{ $item->assigned_quantity }}


                                <input
                                    type="hidden"
                                    name="products[{{ $item->product->id }}][supplied]"
                                    value="{{ $item->assigned_quantity }}">


                            </td>





                            <td class="text-center">


                                <input

                                    type="number"

                                    name="products[{{ $item->product->id }}][remaining]"

                                    value="0"

                                    class="bg-slate-900 border border-slate-700 rounded-lg p-2 w-24 text-white text-center"

                                >


                            </td>


                        </tr>


                    @endforeach


                    </tbody>


                </table>


            </div>




            <button

                class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                Guardar Conteo

            </button>


        </form>


    </div>





@else



    <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg overflow-hidden">


        <table class="w-full text-slate-200">


            <thead>

                <tr class="bg-slate-700 border-b border-slate-600">


                    <th class="p-4">

                        Producto

                    </th>


                    <th>

                        Surtido

                    </th>


                    <th>

                        Restante

                    </th>


                    <th>

                        Vendido

                    </th>


                    <th>

                        Precio

                    </th>


                    <th>

                        Total

                    </th>


                </tr>


            </thead>




            <tbody>


            @foreach($storeVisit->details as $detail)


                <tr class="border-b border-slate-700 hover:bg-slate-700 transition">


                    <td class="p-4">

                        {{ $detail->product->name }}

                    </td>


                    <td class="text-center">

                        {{ $detail->supplied_quantity }}

                    </td>


                    <td class="text-center">

                        {{ $detail->remaining_quantity }}

                    </td>


                    <td class="text-center font-semibold text-green-400">

                        {{ $detail->sold_quantity }}

                    </td>


                    <td class="text-center">

                        ${{ number_format($detail->product->sale_price,2) }}

                    </td>


                    <td class="text-center font-semibold">

                        ${{ number_format(
                            $detail->sold_quantity *
                            $detail->product->sale_price,
                            2
                        ) }}

                    </td>


                </tr>


            @endforeach


            </tbody>


        </table>


    </div>





        @php

        $totalSurtido = $storeVisit->details->sum('supplied_quantity');

        $totalRestante = $storeVisit->details->sum('remaining_quantity');

        $totalVendido = $storeVisit->details->sum('sold_quantity');

        $recuperacion = $storeVisit->details->sum(
            fn($detail)=>
            $detail->sold_quantity *
            $detail->product->sale_price
        );

        $ganancia = $storeVisit->details->sum(
            fn($detail)=>
            $detail->sold_quantity *
            $detail->product->profit
        );

    @endphp



    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-6">


        <div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

            <p class="text-slate-400">
                📦 Total surtido
            </p>

            <h3 class="text-2xl font-bold text-white">
                {{ $totalSurtido }}
            </h3>

        </div>




        <div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

            <p class="text-slate-400">
                🏪 Total restante
            </p>

            <h3 class="text-2xl font-bold text-white">
                {{ $totalRestante }}
            </h3>

        </div>





        <div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

            <p class="text-slate-400">
                🛒 Total vendido
            </p>

            <h3 class="text-2xl font-bold text-green-400">
                {{ $totalVendido }}
            </h3>

        </div>





        <div class="bg-green-900/40 border border-green-700 rounded-lg p-5">

            <p class="text-green-300">
                💰 Recuperación
            </p>

            <h3 class="text-2xl font-bold text-green-300">

                ${{ number_format($recuperacion,2) }}

            </h3>

        </div>


    </div>



    <div class="mt-5 bg-blue-900/40 border border-blue-700 rounded-lg p-5">


        <h2 class="text-xl font-bold text-blue-300">

            📈 Ganancia estimada:

            ${{ number_format($ganancia,2) }}

        </h2>


    </div>



@endif


</div>

@endsection