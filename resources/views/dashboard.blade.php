@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">


    <h1 class="text-3xl font-bold text-white mb-8">

        📊 Dashboard

    </h1>





    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">






        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-slate-400">

                📦 Productos

            </h2>


            <p class="text-3xl font-bold text-white mt-2">

                {{ $products }}

            </p>


        </div>






        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-slate-400">

                👥 Clientes

            </h2>


            <p class="text-3xl font-bold text-white mt-2">

                {{ $customers }}

            </p>


        </div>






        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-slate-400">

                🏪 Tiendas

            </h2>


            <p class="text-3xl font-bold text-white mt-2">

                {{ $stores }}

            </p>


        </div>






        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-slate-400">

                🧾 Ventas realizadas

            </h2>


            <p class="text-3xl font-bold text-white mt-2">

                {{ $sales }}

            </p>


        </div>





    </div>









    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">






        <div class="bg-green-900/40 border border-green-700 rounded-lg p-6">


            <h2 class="text-green-300">

                💰 Dinero generado

            </h2>


            <p class="text-3xl font-bold text-green-400 mt-2">


                ${{ number_format(
                    $totalSales,
                    2
                ) }}


            </p>


            <p class="text-sm text-slate-300 mt-2">

                Ventas realizadas a clientes

            </p>


        </div>







        <div class="bg-blue-900/40 border border-blue-700 rounded-lg p-6">


            <h2 class="text-blue-300">

                📈 Ganancia estimada

            </h2>


            <p class="text-3xl font-bold text-blue-400 mt-2">


                ${{ number_format(
                    $totalProfit,
                    2
                ) }}


            </p>


            <p class="text-sm text-slate-300 mt-2">

                Basada en costos actuales

            </p>


        </div>







        <div class="bg-purple-900/40 border border-purple-700 rounded-lg p-6">


            <h2 class="text-purple-300">

                📦 Productos vendidos

            </h2>


            <p class="text-3xl font-bold text-purple-400 mt-2">

                {{ $productsSold }}

            </p>


            <p class="text-sm text-slate-300 mt-2">

                Unidades acumuladas

            </p>


        </div>





    </div>









    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">







        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-xl font-bold text-white mb-4">

                📊 Rendimiento financiero

            </h2>




            <div class="space-y-3">


                <p class="text-slate-300">

                    Inversión:

                    <span class="text-white font-bold">

                    ${{ number_format(
                        $totalInvestment,
                        2
                    ) }}

                    </span>

                </p>





                <p class="text-slate-300">

                    Recuperación:

                    <span class="text-white font-bold">

                    ${{ number_format(
                        $totalRecovery,
                        2
                    ) }}

                    </span>

                </p>






                <p class="text-slate-300">

                    Rendimiento:

                    <span class="text-green-400 font-bold">


                    ${{ number_format(
                        $profit,
                        2
                    ) }}


                    </span>

                </p>


            </div>


        </div>








        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6">


            <h2 class="text-xl font-bold text-white mb-4">

                ⚡ Accesos rápidos

            </h2>



            <div class="space-y-3">


                <a href="{{ route('products.index') }}"
                class="block bg-slate-700 hover:bg-slate-600 rounded-lg p-3">

                    📦 Productos

                </a>



                <a href="{{ route('customers.index') }}"
                class="block bg-slate-700 hover:bg-slate-600 rounded-lg p-3">

                    👥 Clientes

                </a>




                <a href="{{ route('stores.index') }}"
                class="block bg-slate-700 hover:bg-slate-600 rounded-lg p-3">

                    🏪 Tiendas

                </a>




                <a href="{{ route('finances.index') }}"
                class="block bg-slate-700 hover:bg-slate-600 rounded-lg p-3">

                    📈 Rendimientos

                </a>


            </div>


        </div>







    </div>






</div>


@endsection