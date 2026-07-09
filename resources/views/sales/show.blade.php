@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">



    <div class="flex justify-between items-center mb-6">


        <div>


            <a href="{{ route('sales.index') }}"
               class="text-slate-400 hover:text-white">

                ← Volver a ventas

            </a>



            <h1 class="text-3xl font-bold text-white mt-3">

                🧾 Venta - {{ $sale->customer->name }}

            </h1>



            <p class="text-slate-300 mt-2">

                📅 Fecha:

                {{ $sale->sale_date }}

            </p>


        </div>


    </div>






    <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg overflow-hidden">



        <table class="w-full text-slate-200">



            <thead>


                <tr class="bg-slate-700 border-b border-slate-600">


                    <th class="p-4 text-left">

                        Producto

                    </th>


                    <th class="p-4 text-center">

                        Cantidad

                    </th>


                    <th class="p-4 text-center">

                        Precio

                    </th>


                    <th class="p-4 text-center">

                        Total

                    </th>


                </tr>


            </thead>





            <tbody>



            @forelse($sale->details as $detail)



                <tr class="border-b border-slate-700 hover:bg-slate-700 transition">



                    <td class="p-4">


                        {{ $detail->product->name }}


                    </td>




                    <td class="text-center">


                        {{ $detail->quantity }}


                    </td>




                    <td class="text-center">


                        ${{ number_format($detail->price,2) }}


                    </td>




                    <td class="text-center font-semibold text-green-400">


                        ${{
                            number_format(
                                $detail->quantity *
                                $detail->price,
                                2
                            )
                        }}


                    </td>



                </tr>



            @empty



                <tr>


                    <td colspan="4"
                        class="p-8 text-center text-slate-400">


                        Esta venta no tiene productos registrados.


                    </td>


                </tr>



            @endforelse




            </tbody>



        </table>



    </div>







    <div class="mt-6 bg-green-900/40 border border-green-700 rounded-lg p-6">



        <p class="text-slate-300 text-lg">

            Total de venta

        </p>



        <h2 class="text-3xl font-bold text-green-300">


            ${{
                number_format(
                    $sale->details->sum(
                        fn($d)=>
                        $d->quantity*$d->price
                    ),
                    2
                )
            }}



        </h2>



    </div>




</div>


@endsection