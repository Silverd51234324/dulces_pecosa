@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">


    <div class="flex justify-between items-center mb-6">


        <h1 class="text-3xl font-bold text-white">

            👥 Clientes

        </h1>



        <a href="{{ route('customers.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nuevo cliente

        </a>


    </div>





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


            @forelse($customers as $customer)


                <tr class="border-b border-slate-700 hover:bg-slate-700 transition">


                    <td class="p-4">


                        {{ $customer->name }}


                    </td>



                    <td class="p-4 text-slate-300">


                        {{ $customer->notes ?: '-' }}


                    </td>





                    <td class="p-4 text-center">

                    <a href="{{ route('customers.show',$customer) }}"
   class="text-green-400 hover:text-green-300 mr-4">

    Ver ventas

</a>



                        



                        <a href="{{ route('customers.edit',$customer) }}"
                           class="text-sky-400 hover:text-sky-300 mr-4">

                            Editar

                        </a>




                        <form
                            action="{{ route('customers.destroy',$customer) }}"
                            method="POST"
                            class="inline">


                            @csrf

                            @method('DELETE')



                            <button
                                onclick="return confirm('¿Eliminar cliente?')"
                                class="text-red-400 hover:text-red-300">


                                Eliminar


                            </button>



                        </form>



                    </td>



                </tr>


            @empty

    <tr>

        <td colspan="3"
            class="p-8 text-center text-slate-400">

            No hay clientes registrados.

        </td>

    </tr>

@endforelse


            </tbody>



        </table>



    </div>



</div>


@endsection