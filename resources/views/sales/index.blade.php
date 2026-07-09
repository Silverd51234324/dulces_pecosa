@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">


    <div class="flex justify-between items-center mb-6">


        <h1 class="text-3xl font-bold text-white">

            💰 Ventas

        </h1>



        <a href="{{ route('sales.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nueva venta

        </a>


    </div>





    <div class="space-y-5">



    @forelse($sales as $sale)



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 hover:bg-slate-750 transition">



            <div class="flex justify-between items-start">



                <div>


                    <h2 class="text-xl font-bold text-white">

                        👤 {{ $sale->customer->name }}

                    </h2>



                    <p class="text-slate-300 mt-2">

                        📅 Fecha:

                        {{ $sale->sale_date }}

                    </p>



                    <p class="text-slate-300">

                        🛒 Productos vendidos:

                        {{ $sale->details->sum('quantity') }}

                    </p>



                </div>




                <div class="text-right">


                    <p class="text-sm text-slate-400">

                        Total

                    </p>


                    <p class="text-2xl font-bold text-green-400">


                        ${{
                            number_format(
                                $sale->details->sum(
                                    fn($detail)=>
                                    $detail->quantity *
                                    $detail->price
                                ),
                                2
                            )
                        }}


                    </p>


                </div>



            </div>




            <div class="mt-5 pt-4 border-t border-slate-700">


                <a href="{{ route('sales.show',$sale) }}"
                   class="text-sky-400 hover:text-sky-300">


                    Ver detalle →

                </a>


            </div>




        </div>



    @empty


        <div class="bg-slate-800 border border-slate-700 rounded-lg p-8 text-center text-slate-400">


            No hay ventas registradas.


        </div>



    @endforelse



    </div>



</div>


@endsection