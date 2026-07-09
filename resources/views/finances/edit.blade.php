@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">



    <h1 class="text-3xl font-bold text-white mb-6">

        ✏️ Editar Registro Financiero

    </h1>




    <form action="{{ route('finances.update',$finance) }}"
          method="POST">

        @csrf
        @method('PUT')



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">





            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Fecha

                </label>



                <input

                    type="date"

                    name="date"

                    value="{{ $finance->date }}"

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

                    value="{{ $finance->investment }}"

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

                    value="{{ $finance->manual_recovery }}"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


            </div>







            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Notas

                </label>



                <textarea

                    name="notes"

                    rows="4"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">{{ $finance->notes }}</textarea>


            </div>







            <div class="pt-3 flex gap-3">


                <button

                    type="submit"

                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">


                    Actualizar Registro


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