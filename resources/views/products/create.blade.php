@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">

    <h1 class="text-3xl font-bold text-white mb-6">

        📦 Nuevo Producto

    </h1>


    <form action="{{ route('products.store') }}" method="POST">

        @csrf


        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">


            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Nombre

                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"
                    required>

            </div>



            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Tipo

                </label>


                <select
                    name="type"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                    <option value="packaged">

                        Empaquetado

                    </option>

                    <option value="unit">

                        Por pieza

                    </option>

                </select>

            </div>




            <div class="grid grid-cols-2 gap-4">


                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Cantidad de compra

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="purchase_amount"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"
                        required>

                </div>



                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad

                    </label>

                    <input
                        type="text"
                        name="purchase_unit"
                        placeholder="kg, g, pieza..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"
                        required>

                </div>

            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Rendimiento aproximado

                </label>

                <input
                    type="number"
                    step="0.01"
                    name="production_yield"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"
                    required>

            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Precio de venta

                </label>

                <input
                    type="number"
                    step="0.01"
                    name="sale_price"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"
                    required>

            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Stock mínimo

                </label>

                <input
                    type="number"
                    name="minimum_stock"
                    value="0"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>




            <div class="pt-3 flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                    Guardar Producto

                </button>

                <a href="{{ route('products.index') }}"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg transition">

                    Cancelar

                </a>

            </div>


        </div>


    </form>

</div>

@endsection