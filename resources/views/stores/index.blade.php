@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-white">

            🏪 Tiendas

        </h1>

        <a href="{{ route('stores.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nueva tienda

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

                        Nombre

                    </th>

                    <th class="p-4 text-left">

                        Notas

                    </th>

                    <th class="p-4 text-center">

                        Acciones

                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($stores as $store)

                    <tr class="border-b border-slate-700 hover:bg-slate-700 transition">

                        <td class="p-4">

                            {{ $store->name }}

                        </td>

                        <td class="p-4 text-slate-300">

                            {{ $store->notes ?: '-' }}

                        </td>

                        <td class="p-4 text-center">

                            <a href="{{ route('stores.show',$store) }}"
                               class="text-green-400 hover:text-green-300 mr-4">

                                Ver

                            </a>

                            <a href="{{ route('stores.edit',$store) }}"
                               class="text-sky-400 hover:text-sky-300 mr-4">

                                Editar

                            </a>

                            <form
                                action="{{ route('stores.destroy',$store) }}"
                                method="POST"
                                class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('¿Eliminar tienda?')"
                                    class="text-red-400 hover:text-red-300">

                                    Eliminar

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="p-8 text-center text-slate-400">

                            No hay tiendas registradas.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection