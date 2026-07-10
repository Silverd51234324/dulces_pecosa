@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-6">


    <div class="mb-6">


        <a href="{{ route('customers.show',$sale->customer) }}"
           class="text-slate-400 hover:text-white">

            ← Volver al cliente

        </a>



        <h1 class="text-3xl font-bold text-white mt-3">

            ✏️ Editar venta - {{ $sale->customer->name }}

        </h1>



        <p class="text-slate-400 mt-2">

            Modifica los productos, cantidades o precios.

        </p>


    </div>







    <form action="{{ route('sales.update',$sale) }}"
          method="POST">


        @csrf

        @method('PUT')





        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6 space-y-6">





            <div>


                <label class="block text-sm font-semibold text-slate-300 mb-2">

                    Fecha de venta

                </label>



                <input

                    type="date"

                    name="sale_date"

                    value="{{ $sale->sale_date }}"

                    class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"

                >


            </div>









            <div class="grid md:grid-cols-3 gap-4">


                <div>


                    <label class="block text-sm text-slate-300 mb-2">

                        Producto

                    </label>


                    <select
                        id="productSelect"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">


                        @foreach($products as $product)


                        <option

                            value="{{ $product->id }}"

                            data-name="{{ $product->name }}"

                            data-cost="{{ $product->unit_cost }}"

                            data-price="{{ $product->sale_price }}"

                        >

                            {{ $product->name }}

                        </option>


                        @endforeach


                    </select>


                </div>






                <div>


                    <label class="block text-sm text-slate-300 mb-2">

                        Cantidad

                    </label>


                    <input

                        type="number"

                        id="quantity"

                        min="1"

                        value="1"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"

                    >


                </div>







                <div>


                    <label class="block text-sm text-slate-300 mb-2">

                        Precio vendido

                    </label>


                    <input

                        type="number"

                        step="0.01"

                        id="price"

                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white"

                    >


                </div>



            </div>






            <button

                type="button"

                id="addProduct"

                class="bg-green-600 hover:bg-green-700 px-5 py-2 rounded-lg text-white">


                ➕ Agregar producto


            </button>








            <div class="overflow-hidden rounded-lg border border-slate-700">


                <table class="w-full text-slate-200">


                    <thead>


                        <tr class="bg-slate-700">


                            <th class="p-3 text-left">

                                Producto

                            </th>


                            <th>

                                Cantidad

                            </th>


                            <th>

                                Precio

                            </th>


                            <th>

                                Total

                            </th>


                            <th>

                                Acción

                            </th>


                        </tr>


                    </thead>



                    <tbody id="saleBody">



                    @foreach($sale->details as $detail)


                        <tr class="border-b border-slate-700">


                            <td class="p-3">

                                {{ $detail->product->name }}

                            </td>


                            <td class="text-center">

                                {{ $detail->quantity }}

                            </td>


                            <td class="text-center">

                                ${{ number_format($detail->price,2) }}

                            </td>



                            <td class="text-center text-green-400">

                                ${{ number_format(
                                    $detail->quantity*$detail->price,
                                    2
                                ) }}

                            </td>



                            <td class="text-center">

                                -

                            </td>


                        </tr>


                    @endforeach



                    </tbody>


                </table>


            </div>







            <div id="hiddenInputs">


            @foreach($sale->details as $index=>$detail)


                <input
                    type="hidden"
                    name="products[{{ $index }}][product_id]"
                    value="{{ $detail->product_id }}">



                <input
                    type="hidden"
                    name="products[{{ $index }}][quantity]"
                    value="{{ $detail->quantity }}">



                <input
                    type="hidden"
                    name="products[{{ $index }}][price]"
                    value="{{ $detail->price }}">


            @endforeach


            </div>





        </div>





        <button

            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">


            Guardar cambios


        </button>





    </form>



</div>





@push('scripts')

<script>


 let items = {!! json_encode(
    $sale->details->map(function($d){

        return [
            'product_id' => $d->product_id,
            'name' => $d->product->name,
            'quantity' => $d->quantity,
            'price' => $d->price,
            'cost' => $d->product->unit_cost
        ];

    })->values()
) !!};



const body=document.getElementById('saleBody');

const hidden=document.getElementById('hiddenInputs');



function render()
{


    body.innerHTML='';

    hidden.innerHTML='';



    items.forEach((item,index)=>{


        body.innerHTML += `

        <tr class="border-b border-slate-700">


        <td class="p-3">

        ${item.name}

        </td>


        <td class="text-center">

        ${item.quantity}

        </td>


        <td class="text-center">

        $${Number(item.price).toFixed(2)}

        </td>


        <td class="text-center text-green-400">

        $${(item.quantity*item.price).toFixed(2)}

        </td>


        <td class="text-center">


        <button

        type="button"

        onclick="removeItem(${index})"

        class="text-red-400">

        Eliminar

        </button>


        </td>


        </tr>

        `;




        hidden.innerHTML += `


        <input type="hidden"
        name="products[${index}][product_id]"
        value="${item.product_id}">


        <input type="hidden"
        name="products[${index}][quantity]"
        value="${item.quantity}">


        <input type="hidden"
        name="products[${index}][price]"
        value="${item.price}">


        `;


    });


}





document.getElementById('addProduct')
.addEventListener('click',()=>{


let select=document.getElementById('productSelect');

let option=select.options[select.selectedIndex];


items.push({


product_id:option.value,

name:option.dataset.name,

quantity:Number(
document.getElementById('quantity').value
),


price:Number(
document.getElementById('price').value
),


cost:Number(
option.dataset.cost
)


});


render();


});





function removeItem(index)
{

items.splice(index,1);

render();

}





render();


</script>


@endpush



@endsection