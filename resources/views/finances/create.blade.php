@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">



    <h1 class="text-3xl font-bold text-white mb-6">

        📊 Nueva Inversión

    </h1>




    <form action="{{ route('finances.store') }}"
          method="POST">

        @csrf



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">





            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Fecha

                </label>



                <input

                    type="date"

                    name="date"

                    value="{{ date('Y-m-d') }}"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


            </div>







            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Cantidad invertida

                </label>



                <input

                    type="number"

                    step="0.01"

                    name="investment"

                    placeholder="Ejemplo: 500"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


            </div>







            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Recuperación manual

                </label>



                <input

                    type="number"

                    step="0.01"

                    name="manual_recovery"

                    placeholder="Ejemplo: 750"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


            </div>







            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Notas

                </label>



                <textarea

                    name="notes"

                    rows="4"

                    placeholder="Detalles de la inversión..."

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500"></textarea>


            </div>







            <div class="pt-3 flex gap-3">



                <button

                    type="submit"

                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">


                    Guardar Inversión


                </button>




                <a href="{{ route('finances.index') }}"

                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg transition">


                    Cancelar


                </a>



            </div>





        </div>



    </form>



</div>


@endsection