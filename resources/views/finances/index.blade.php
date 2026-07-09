@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">



    <div class="flex justify-between items-center mb-6">



        <h1 class="text-3xl font-bold text-white">

            📊 Rendimientos

        </h1>




        <a href="{{ route('finances.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">

            Nueva inversión

        </a>



    </div>







    <div class="space-y-5">



    @forelse($finances as $finance)



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6">


    <div class="flex justify-between">


        <div>


            <h2 class="text-xl font-bold text-white">

                📅 {{ $finance->date }}

            </h2>


            <p class="text-slate-300 mt-3">

                💵 Inversión:

                <strong class="text-red-400">

                    ${{ number_format($finance->investment,2) }}

                </strong>

            </p>



            <p class="text-slate-300">

                💰 Recuperación:

                <strong class="text-green-400">

                    ${{ number_format($finance->manual_recovery,2) }}

                </strong>

            </p>




            <p class="text-slate-300 mt-2">

                📈 Rendimiento:

                @php

                    $profit = 
                    $finance->manual_recovery -
                    $finance->investment;

                @endphp



                <strong class="{{ $profit >= 0 ? 'text-green-400':'text-red-400' }}">

                    ${{ number_format($profit,2) }}

                </strong>


            </p>




            @if($finance->notes)

                <p class="text-slate-400 mt-3">

                    📝 {{ $finance->notes }}

                </p>

            @endif



        </div>




        <div class="flex gap-3">


            <a href="{{ route('finances.edit',$finance) }}"
               class="text-sky-400 hover:text-sky-300">

                Editar

            </a>




            <form action="{{ route('finances.destroy',$finance) }}"
                  method="POST">


                @csrf

                @method('DELETE')


                <button
                    onclick="return confirm('¿Eliminar registro?')"
                    class="text-red-400 hover:text-red-300">

                    Eliminar

                </button>


            </form>


        </div>



    </div>


</div>



    @empty



        <div class="bg-slate-800 border border-slate-700 rounded-lg p-8 text-center text-slate-400">


            No hay registros financieros.


        </div>



    @endforelse



    </div>




</div>


@endsection