@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-white">
            📦 Productos
        </h1>

        <a href="{{ route('products.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nuevo producto

        </a>

    </div>

    <div class="flex justify-between items-center mb-6">

    <div class="relative w-96">

        <input
            type="text"
            id="searchProduct"
            placeholder="🔍 Buscar producto..."
            class="w-full bg-slate-800 border border-slate-700 rounded-lg p-3 pl-4 text-white placeholder-slate-400 focus:border-green-500 focus:outline-none">

    </div>

</div>


    @if(session('success'))

        <div class="bg-green-900/40 border border-green-700 text-green-300 p-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    <div class="bg-slate-800 border border-slate-700 rounded-lg overflow-hidden shadow-lg">

        <table class="w-full text-slate-200">

            <thead>

                <tr class="bg-slate-700 border-b border-slate-600">

                    <th class="p-4 text-left">
                        Producto
                    </th>

                    <th class="p-4 text-center">
                        Compra
                    </th>

                    <th class="p-4 text-center">
                        Precio Compra
                    </th>

                    <th class="p-4 text-center">
                        Rendimiento
                    </th>

                    <th class="p-4 text-center">
                        Costo Unidad
                    </th>

                    <th class="p-4 text-center">
                        Precio Venta
                    </th>

                    <th class="p-4 text-center">
                        Ganancia
                    </th>

                    <th class="p-4 text-center">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($products as $product)

<tr
    class="product-row border-b border-slate-700 hover:bg-slate-700 transition"
    data-search="
        {{ strtolower($product->name) }}
        {{ strtolower($product->type == 'packaged' ? 'empaquetado' : 'pieza') }}
        {{ strtolower($product->purchase_unit) }}
        {{ $product->purchase_amount }}
        {{ $product->purchase_price }}
        {{ $product->sale_price }}
    ">

                        <td class="p-4">

                            <div class="font-semibold">

                                {{ $product->name }}

                            </div>

                            <div class="text-xs text-slate-400">

                                {{ $product->type == 'packaged' ? 'Empaquetado' : 'Pieza' }}

                            </div>

                        </td>


                        <td class="text-center">

                            {{ number_format($product->purchase_amount,2) }}

                            {{ $product->purchase_unit }}

                        </td>


                        <td class="text-center text-orange-300 font-semibold">

                            ${{ number_format($product->purchase_price,2) }}

                        </td>


                        <td class="text-center">

                            {{ number_format($product->production_yield,2) }}

                        </td>


                        <td class="text-center text-yellow-300 font-semibold">

                            ${{ number_format($product->unit_cost,2) }}

                        </td>


                        <td class="text-center text-cyan-300 font-semibold">

                            ${{ number_format($product->sale_price,2) }}

                        </td>


                        <td class="text-center">

                            @if($product->profit >= 0)

                                <span class="text-green-400 font-bold">

                                    ${{ number_format($product->profit,2) }}

                                </span>

                            @else

                                <span class="text-red-400 font-bold">

                                    ${{ number_format($product->profit,2) }}

                                </span>

                            @endif

                        </td>


                        <td class="text-center">

                            <a href="{{ route('products.edit',$product) }}"
                                class="text-sky-400 hover:text-sky-300">

                                Editar

                            </a>


                            <form
                                action="{{ route('products.destroy',$product) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="text-red-400 hover:text-red-300 ml-4"
                                    onclick="return confirm('¿Eliminar producto?')">

                                    Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="p-8 text-center text-slate-400">

                            No hay productos registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

const input = document.getElementById('searchProduct');

const rows = document.querySelectorAll('.product-row');

input.addEventListener('keyup', function(){

    const text = this.value.toLowerCase();

    rows.forEach(row=>{

        const search = row.dataset.search;

        if(search.includes(text))
        {
            row.style.display='';
        }
        else
        {
            row.style.display='none';
        }

    });

});

</script>

@endsection