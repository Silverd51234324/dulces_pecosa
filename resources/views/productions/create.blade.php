@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">

    <h1 class="text-3xl font-bold text-white mb-6">

        🏭 Nueva Preparación

    </h1>


    <form action="{{ route('productions.store') }}" method="POST">

        @csrf


        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">


            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Producto

                </label>

                <select
                    name="product_id"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                    @foreach($products as $product)

                        <option value="{{ $product->id }}">

                            {{ $product->name }}

                        </option>

                    @endforeach

                </select>

            </div>




            <div class="grid grid-cols-2 gap-4">


                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Cantidad utilizada

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="input_quantity"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                </div>



                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad utilizada

                    </label>

                    <input
                        type="text"
                        name="input_unit"
                        placeholder="kg, g, pieza..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                </div>

            </div>




            <div class="grid grid-cols-2 gap-4">


                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Cantidad producida

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="output_quantity"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                </div>



                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad producida

                    </label>

                    <input
                        type="text"
                        name="output_unit"
                        placeholder="bolsa, pieza..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                </div>

            </div>




            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Costo utilizado

                </label>

                <input
                    type="number"
                    step="0.01"
                    name="cost"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>




            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Precio de venta

                </label>

                <input
                    type="number"
                    step="0.01"
                    name="sale_price"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>




            <div class="pt-3 flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                    Guardar Preparación

                </button>

                <a href="{{ route('productions.index') }}"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg transition">

                    Cancelar

                </a>

            </div>


        </div>

    </form>

</div>

@endsection