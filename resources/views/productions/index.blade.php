@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-white">

            🏭 Producción

        </h1>

        <a href="{{ route('productions.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nueva preparación

        </a>

    </div>


    <div class="bg-slate-800 border border-slate-700 rounded-lg overflow-hidden shadow-lg">

        <table class="w-full text-slate-200">

            <thead>

                <tr class="bg-slate-700 border-b border-slate-600">

                    <th class="p-4 text-left">

                        Producto

                    </th>

                    <th class="p-4 text-center">

                        Entrada

                    </th>

                    <th class="p-4 text-center">

                        Salida

                    </th>

                    <th class="p-4 text-right">

                        Costo

                    </th>

                    <th>
Acciones
</th>

                </tr>

            </thead>


            <tbody>

                @forelse($productions as $production)

                    <tr class="border-b border-slate-700 hover:bg-slate-700 transition">

                        <td class="p-4">

                            {{ $production->product->name }}

                        </td>

                        <td class="p-4 text-center">

                            {{ $production->input_quantity }}

                            {{ $production->input_unit }}

                        </td>

                        <td class="p-4 text-center">

                            {{ $production->output_quantity }}

                            {{ $production->output_unit }}

                        </td>

                        <td class="p-4 text-right font-semibold text-green-400">

                            ${{ number_format($production->cost,2) }}

                        </td>

                        <td class="text-center">


<a href="{{ route('productions.edit',$production) }}"
class="text-sky-400 hover:text-sky-300">

Editar

</a>



<form
action="{{ route('productions.destroy',$production) }}"
method="POST"
class="inline">


@csrf
@method('DELETE')


<button

onclick="return confirm('¿Eliminar preparación?')"

class="text-red-400 ml-3 hover:text-red-300">


Eliminar


</button>


</form>


</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="p-8 text-center text-slate-400">

                            No hay preparaciones registradas.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection