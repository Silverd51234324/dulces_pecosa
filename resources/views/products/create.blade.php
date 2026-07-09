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
                    Nombre del producto
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                    required>

            </div>



            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">
                    Tipo
                </label>


                <select
                    name="type"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


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

                    <label class="text-slate-300">
                        Compra
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="purchase_amount"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                        required>


                </div>



                <div>

                    <label class="text-slate-300">
                        Unidad compra
                    </label>


                    <input
                        type="text"
                        name="purchase_unit"
                        placeholder="g, kg, pieza"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                        required>


                </div>


            </div>





            <div>


                <label class="text-slate-300">
                    Precio Compra
                </label>


                <input
                    type="number"
                    step="0.01"
                    name="purchase_price"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                    required>


            </div>






            <div class="grid grid-cols-2 gap-4">


                <div>

                    <label class="text-slate-300">
                        Cantidad por Unidad
                    </label>


                    <input
                        type="number"
                        step="0.01"
                        name="unit_quantity"
                        placeholder="Ejemplo: 25"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                        required>


                </div>


                <div>

                    <label class="text-slate-300">
                        Unidad
                    </label>


                    <input
                        type="text"
                        name="unit_unit"
                        placeholder="g, pieza..."
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
                        required>


                </div>


            </div>





            {{-- CAMPOS AUTOMATICOS --}}


            <div class="grid grid-cols-3 gap-4">


                <div>

                    <label class="text-slate-400">
                        Rendimiento
                    </label>


                    <input
                        readonly
                        name="production_yield"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-green-400">

                </div>



                <div>

                    <label class="text-slate-400">
                        Costo Unidad
                    </label>


                    <input
                        readonly
                        name="unit_cost"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-yellow-400">


                </div>

                <div>

    <label class="text-slate-300">
        Precio Venta
    </label>

    <input
        type="number"
        step="0.01"
        name="sale_price"
        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"
        required>

</div>



                <div>

                    <label class="text-slate-400">
                        Ganancia
                    </label>


                    <input
                        readonly
                        name="profit"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-green-400">


                </div>


            </div>






            {{-- PREVIEW --}}


            <div class="bg-slate-900 border border-slate-700 rounded-lg p-5">


                <h2 class="text-xl font-bold text-white mb-4">
                    📊 Vista previa
                </h2>



                <div class="grid grid-cols-3 text-center">


                    <div>

                        <p class="text-slate-400">
                            Rendimiento
                        </p>

                        <p id="previewYield"
                           class="text-xl text-white">
                            0
                        </p>

                    </div>



                    <div>

                        <p class="text-slate-400">
                            Costo Unidad
                        </p>

                        <p id="previewCost"
                           class="text-xl text-yellow-400">
                            $0
                        </p>

                    </div>



                    <div>

                        <p class="text-slate-400">
                            Ganancia
                        </p>

                        <p id="previewProfit"
                           class="text-xl text-green-400">
                            $0
                        </p>

                    </div>


                </div>


            </div>





            <button
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                Guardar Producto

            </button>


        </div>


    </form>


</div>


@endsection