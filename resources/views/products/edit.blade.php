@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">

    <h1 class="text-3xl font-bold text-white mb-6">

        ✏️ Editar Producto

    </h1>


    @if($errors->any())

        <div class="bg-red-900/40 border border-red-700 text-red-300 p-4 rounded-lg mb-6">

            @foreach($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

        </div>

    @endif


    <form action="{{ route('products.update',$product) }}" method="POST">

        @csrf
        @method('PUT')


        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">


            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Nombre

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $product->name }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>



            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Tipo

                </label>

                <select
                    name="type"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                    <option value="packaged"
                        @if($product->type=='packaged') selected @endif>

                        Empaquetado

                    </option>

                    <option value="unit"
                        @if($product->type=='unit') selected @endif>

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
                        value="{{ $product->purchase_amount }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

                </div>



                <div>

                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad

                    </label>

                    <input
                        type="text"
                        name="purchase_unit"
                        value="{{ $product->purchase_unit }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

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
                    value="{{ $product->production_yield }}"
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
                    value="{{ $product->sale_price }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Stock mínimo

                </label>

                <input
                    type="number"
                    name="minimum_stock"
                    value="{{ $product->minimum_stock }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Orden de visualización

                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ $product->display_order }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">

            </div>




            <div class="pt-3 flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                    Actualizar Producto

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