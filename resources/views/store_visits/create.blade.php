@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">


    <h1 class="text-3xl font-bold text-white mb-6">

        📝 Nueva Visita

    </h1>



    <form
        action="{{ route('store-visits.store') }}"
        method="POST">

        @csrf



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">



            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Tienda

                </label>


                <select
                    name="store_id"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


                    @foreach($stores as $store)

                        <option 
                            value="{{ $store->id }}"

                            @if($selectedStore && $selectedStore->id == $store->id)

                                selected

                            @endif
                        >

                            {{ $store->name }}

                        </option>


                    @endforeach


                </select>


            </div>





            <div>

                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Fecha de visita

                </label>


                <input
                    type="date"
                    name="visit_date"
                    value="{{ date('Y-m-d') }}"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white focus:outline-none focus:border-green-500">


            </div>





            <div class="pt-3 flex gap-3">


                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">

                    Continuar

                </button>


                <a href="{{ route('stores.index') }}"
                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg transition">

                    Cancelar

                </a>


            </div>


        </div>


    </form>


</div>


@endsection