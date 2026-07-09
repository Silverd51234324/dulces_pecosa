@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto py-6">

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

        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-6">

            {{-- Producto --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Producto
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

            </div>



            {{-- Tipo --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Tipo
                </label>

                <select
                    name="type"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                    <option value="packaged"
                        {{ $product->type == 'packaged' ? 'selected' : '' }}>

                        Empaquetado

                    </option>

                    <option value="unit"
                        {{ $product->type == 'unit' ? 'selected' : '' }}>

                        Pieza

                    </option>

                </select>

            </div>



            {{-- Compra --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Compra
                </label>

                <div class="grid grid-cols-2 gap-3">

                    <input
                        type="number"
                        step="0.01"
                        name="purchase_amount"
                        value="{{ old('purchase_amount', $product->purchase_amount) }}"
                        class="bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                    <select
                        name="purchase_unit"
                        class="bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                        <option value="g" {{ $product->purchase_unit == 'g' ? 'selected' : '' }}>g</option>
                        <option value="kg" {{ $product->purchase_unit == 'kg' ? 'selected' : '' }}>kg</option>
                        <option value="ml" {{ $product->purchase_unit == 'ml' ? 'selected' : '' }}>ml</option>
                        <option value="L" {{ $product->purchase_unit == 'L' ? 'selected' : '' }}>L</option>
                        <option value="pieza" {{ $product->purchase_unit == 'pieza' ? 'selected' : '' }}>Pieza</option>

                    </select>

                </div>

            </div>



            {{-- Precio compra --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Precio Compra
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="purchase_price"
                    value="{{ old('purchase_price', $product->purchase_price) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

            </div>



            {{-- Cantidad por unidad --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Cantidad por Unidad
                </label>

                <div class="grid grid-cols-2 gap-3">

                    <input
                        type="number"
                        step="0.01"
                        name="unit_quantity"
                        value="{{ old('unit_quantity', $product->unit_quantity) }}"
                        class="bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                    <select
                        name="unit_unit"
                        class="bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                        <option value="g" {{ $product->unit_unit == 'g' ? 'selected' : '' }}>g</option>
                        <option value="kg" {{ $product->unit_unit == 'kg' ? 'selected' : '' }}>kg</option>
                        <option value="ml" {{ $product->unit_unit == 'ml' ? 'selected' : '' }}>ml</option>
                        <option value="L" {{ $product->unit_unit == 'L' ? 'selected' : '' }}>L</option>
                        <option value="pieza" {{ $product->unit_unit == 'pieza' ? 'selected' : '' }}>Pieza</option>

                    </select>

                </div>

            </div>



            {{-- Precio venta --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Precio de Venta
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="sale_price"
                    value="{{ old('sale_price', $product->sale_price) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

            </div>



            {{-- Stock mínimo --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Stock Mínimo
                </label>

                <input
                    type="number"
                    name="minimum_stock"
                    value="{{ old('minimum_stock', $product->minimum_stock) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

            </div>



            {{-- Orden --}}

            <div>

                <label class="block text-slate-300 mb-2 font-semibold">
                    Orden de Visualización
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ old('display_order', $product->display_order) }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

            </div>



            {{-- Datos calculados --}}

            <div class="bg-slate-900 border border-slate-700 rounded-lg p-5">

                <h2 class="text-lg font-bold text-green-400 mb-4">
                    📊 Datos Calculados
                </h2>

                <div class="grid grid-cols-3 gap-4 text-center">

                    <div>

                        <p class="text-slate-400 text-sm">
                            Rendimiento
                        </p>

                        <p class="text-xl font-bold text-white">
                            {{ number_format($product->production_yield,2) }}
                        </p>

                    </div>

                    <div>

                        <p class="text-slate-400 text-sm">
                            Costo Unidad
                        </p>

                        <p class="text-xl font-bold text-yellow-400">
                            ${{ number_format($product->unit_cost,2) }}
                        </p>

                    </div>

                    <div>

                        <p class="text-slate-400 text-sm">
                            Ganancia
                        </p>

                        <p class="text-xl font-bold text-green-400">
                            ${{ number_format($product->profit,2) }}
                        </p>

                    </div>

                </div>

            </div>



            <div class="flex gap-3">

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                    Actualizar Producto

                </button>

                <a
                    href="{{ route('products.index') }}"
                    class="bg-slate-600 hover:bg-slate-500 text-white px-6 py-3 rounded-lg">

                    Cancelar

                </a>

            </div>

        </div>

    </form>

</div>

@endsection