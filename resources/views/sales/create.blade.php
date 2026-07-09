@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-6">


    <h1 class="text-3xl font-bold text-white mb-6">

        💰 Nueva Venta

    </h1>




    <form action="{{ route('sales.store') }}"
          method="POST">

        @csrf



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-6">





            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Cliente

                </label>



                <select
                    name="customer_id"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


                    @foreach($customers as $customer)


                        <option value="{{ $customer->id }}">

                            {{ $customer->name }}

                        </option>


                    @endforeach


                </select>


            </div>







            <div>


                <h2 class="text-xl font-bold text-white mb-4">

                    📦 Productos

                </h2>



                <div class="space-y-3">


                @forelse($products as $product)



                    <div class="flex justify-between items-center bg-slate-900 border border-slate-700 rounded-lg p-4">


                        <div>


                            <p class="text-white font-semibold">

                                {{ $product->name }}

                            </p>


                            <p class="text-sm text-slate-400">


                                Precio:

                                ${{ number_format($product->sale_price,2) }}


                            </p>


                        </div>




                        <input

                            type="number"

                            name="products[{{ $product->id }}]"

                            placeholder="Cantidad"

                            class="bg-slate-800 border border-slate-600 rounded-lg p-2 w-32 text-white text-center"

                            min="0"

                        >



                    </div>




                @empty



                    <div class="text-center text-slate-400 p-5">

                        No hay productos disponibles.

                    </div>



                @endforelse



                </div>



            </div>





        </div>





        <button

            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">


            Guardar Venta


        </button>




    </form>


</div>


@endsection