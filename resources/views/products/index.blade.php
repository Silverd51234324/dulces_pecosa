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
                        Tipo
                    </th>

                    <th class="p-4 text-center">
                        Compra
                    </th>

                    <th class="p-4 text-center">
                        Rendimiento
                    </th>

                    <th class="p-4 text-right">
                        Precio
                    </th>

                    <th class="p-4 text-center">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($products as $product)

                    <tr class="border-b border-slate-700 hover:bg-slate-700 transition">

                        <td class="p-4">

                            {{ $product->name }}

                        </td>


                        <td class="p-4 text-center">

                            @if($product->type == 'packaged')

                                Empaquetado

                            @else

                                Pieza

                            @endif

                        </td>


                        <td class="p-4 text-center">

                            {{ $product->purchase_amount }}

                            {{ $product->purchase_unit }}

                        </td>


                        <td class="p-4 text-center">

                            {{ $product->production_yield }}

                        </td>


                        <td class="p-4 text-right font-semibold text-green-400">

                            ${{ number_format($product->sale_price,2) }}

                        </td>


                        <td class="p-4 text-center">

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

                        <td colspan="6" class="p-8 text-center text-slate-400">

                            No hay productos registrados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection