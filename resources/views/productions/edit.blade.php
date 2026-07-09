@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-6">


    <h1 class="text-3xl font-bold text-white mb-6">

        ✏️ Editar preparación

    </h1>



    <form action="{{ route('productions.update',$production) }}"
          method="POST">


        @csrf

        @method('PUT')



        <div class="bg-slate-800 border border-slate-700 rounded-lg shadow-lg p-6 space-y-5">





            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Producto

                </label>



                <select
                    name="product_id"
                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                    @foreach($products as $product)


                        <option value="{{ $product->id }}"
                        
                        @if($production->product_id == $product->id)
                            selected
                        @endif
                        
                        >

                            {{ $product->name }}

                        </option>


                    @endforeach


                </select>


            </div>








            <div class="grid grid-cols-2 gap-4">



                <div>


                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Cantidad utilizada

                    </label>



                    <input

                        type="number"

                        step="0.01"

                        name="input_quantity"

                        value="{{ $production->input_quantity }}"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                </div>





                <div>


                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad utilizada

                    </label>



                    <input

                        type="text"

                        name="input_unit"

                        value="{{ $production->input_unit }}"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                </div>



            </div>









            <div class="grid grid-cols-2 gap-4">



                <div>


                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Cantidad producida

                    </label>



                    <input

                        type="number"

                        step="0.01"

                        name="output_quantity"

                        value="{{ $production->output_quantity }}"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                </div>






                <div>


                    <label class="block text-sm font-semibold text-slate-300 mb-2">

                        Unidad producida

                    </label>



                    <input

                        type="text"

                        name="output_unit"

                        value="{{ $production->output_unit }}"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                </div>



            </div>









            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Costo utilizado

                </label>



                <input

                    type="number"

                    step="0.01"

                    name="cost"

                    value="{{ $production->cost }}"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


            </div>









            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Precio venta

                </label>



                <input

                    type="number"

                    step="0.01"

                    name="sale_price"

                    value="{{ $production->sale_price }}"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


            </div>








            <div class="pt-3 flex gap-3">



                <button

                    type="submit"

                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition">


                    Actualizar preparación


                </button>





                <a href="{{ route('productions.index') }}"

                   class="bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg transition">


                    Cancelar


                </a>




            </div>





        </div>




    </form>



</div>


@endsection