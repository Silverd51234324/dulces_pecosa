@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">

    <div class="flex justify-between items-center mb-6">

        <div>

            <a href="{{ route('stores.index') }}"
               class="text-slate-400 hover:text-white">

                ← Volver a Tiendas

            </a>

            <h1 class="text-3xl font-bold text-white mt-2">

                🏪 {{ $store->name }}

            </h1>

        </div>

        <a href="{{ route('store-visits.create',['store'=>$store->id]) }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Registrar visita

        </a>

    </div>



    <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 mb-6">

        <h2 class="text-xl font-bold text-white mb-4">

            📦 Agregar producto al exhibidor

        </h2>

        <form
            action="{{ route('store_products.store',$store) }}"
            method="POST">

            @csrf

            <select
                name="product_id"
                class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white mb-4">

                @foreach($products as $product)

                    <option value="{{ $product->id }}">

                        {{ $product->name }}

                    </option>

                @endforeach

            </select>

            <input
                type="number"
                step="0.01"
                name="assigned_quantity"
                placeholder="Cantidad asignada"
                class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white mb-4">

            <button
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                Asignar Producto

            </button>

        </form>

    </div>




    <div class="bg-slate-800 border border-slate-700 rounded-lg overflow-hidden shadow-lg mb-8">

        <table class="w-full text-slate-200">

            <thead>

                <tr class="bg-slate-700 border-b border-slate-600">

                    <th class="p-4 text-left">

                        Producto

                    </th>

                    <th class="p-4 text-center">

                        Cantidad

                    </th>

                    <th>
Acciones
</th>

                </tr>

            </thead>

            <tbody>

                @forelse($store->products as $item)

                    <tr class="border-b border-slate-700 hover:bg-slate-700 transition">

                        <td class="p-4">

                            {{ $item->product->name }}

                        </td>

                        <td class="text-center">

    {{ $item->assigned_quantity }}

</td>


<td class="text-center">


<form
action="{{ route('store_products.destroy',[$store,$item]) }}"
method="POST">


@csrf

@method('DELETE')


<button

onclick="return confirm('¿Quitar este producto de la tienda?')"

class="text-red-400 hover:text-red-300">


Eliminar


</button>


</form>


</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="2"
                            class="p-8 text-center text-slate-400">

                            No hay productos asignados.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>





    <h2 class="text-2xl font-bold text-white mb-4">

        📝 Historial de visitas

    </h2>

    @forelse($store->visits->sortByDesc('visit_date') as $visit)

        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-5 mb-4">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="text-lg font-bold text-white">

                        {{ $visit->visit_date }}

                    </h3>

                    <p class="text-slate-300 mt-2">

                        Piezas vendidas:
                        <strong>

                            {{ $visit->details->sum('sold_quantity') }}

                        </strong>

                    </p>

                    <p class="text-slate-300">

                        Recuperación:
                        <strong class="text-green-400">

                            ${{
                                number_format(
                                    $visit->details->sum(
                                        fn($detail)=>
                                        $detail->sold_quantity *
                                        $detail->product->sale_price
                                    ),
                                    2
                                )
                            }}

                        </strong>

                    </p>

                </div>

                <div class="flex gap-4 mt-3">


<a href="{{ route('store-visits.show',$visit) }}"
class="text-sky-400 hover:text-sky-300">

Ver detalle

</a>




<form
action="{{ route('store-visits.destroy',$visit) }}"
method="POST">


@csrf

@method('DELETE')


<button

onclick="return confirm('¿Eliminar esta visita del historial?')"

class="text-red-400 hover:text-red-300">


Eliminar


</button>


</form>



</div>

            </div>

        </div>

    @empty

        <div class="bg-slate-800 border border-slate-700 rounded-lg p-8 text-center text-slate-400">

            Aún no hay visitas registradas.

        </div>

    @endforelse

</div>

@endsection