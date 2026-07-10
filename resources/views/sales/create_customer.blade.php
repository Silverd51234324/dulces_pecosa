@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">

    <a href="{{ route('customers.show',$customer) }}"
       class="text-slate-400 hover:text-white">

        ← Volver al cliente

    </a>

    <div class="flex justify-between items-center mt-4">

        <div>

            <h1 class="text-3xl font-bold text-white">

                💰 Nueva venta

            </h1>

            <p class="text-slate-400 mt-2">

                Cliente:
                <strong>{{ $customer->name }}</strong>

            </p>

        </div>

    </div>

    <form
        action="{{ route('sales.customer.store',$customer) }}"
        method="POST"
        id="saleForm">

        @csrf

        <div class="bg-slate-800 border border-slate-700 rounded-lg p-6 mt-6">

            <div class="grid md:grid-cols-4 gap-4">

                <div>

                    <label class="block text-slate-300 mb-2">

                        Fecha

                    </label>

                    <input
                        type="date"
                        name="sale_date"
                        value="{{ date('Y-m-d') }}"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                </div>

                <div>

                    <label class="block text-slate-300 mb-2">

                        Producto

                    </label>

                    <select
                        id="productSelect"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                        @foreach($products as $product)

                            <option
                                value="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->sale_price }}"
                                data-cost="{{ $product->unit_cost }}">

                                {{ $product->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-slate-300 mb-2">

                        Cantidad

                    </label>

                    <input
                        type="number"
                        id="quantity"
                        value="1"
                        min="1"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                </div>

                <div>

                    <label class="block text-slate-300 mb-2">

                        Precio de venta

                    </label>

                    <input
                        type="number"
                        id="price"
                        step="0.01"
                        class="w-full bg-slate-900 border border-slate-700 rounded-lg p-3 text-white">

                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-5 mt-6">

                <div class="bg-slate-900 rounded-lg p-5">

                    <p class="text-slate-400">

                        Costo por unidad

                    </p>

                    <h2
                        id="unitCost"
                        class="text-2xl font-bold text-green-400">

                        $0.00

                    </h2>

                </div>

                <div class="bg-slate-900 rounded-lg p-5">

                    <p class="text-slate-400">

                        Ganancia por unidad

                    </p>

                    <h2
                        id="unitProfit"
                        class="text-2xl font-bold text-green-400">

                        $0.00

                    </h2>

                </div>

            </div>

            <button
                type="button"
                id="addProduct"
                class="mt-6 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg text-white transition">

                ➕ Agregar producto

            </button>

        </div>

        <div class="bg-slate-800 border border-slate-700 rounded-lg overflow-hidden mt-8">

            <table class="w-full text-slate-200">

                <thead>

                    <tr class="bg-slate-700">

                        <th class="p-4 text-left">

                            Producto

                        </th>

                        <th class="text-center">

                            Cantidad

                        </th>

                        <th class="text-center">

                            Precio

                        </th>

                        <th class="text-center">

                            Total

                        </th>

                        <th class="text-center">

                            Acción

                        </th>

                    </tr>

                </thead>

                <tbody id="saleBody">

                    <tr id="emptyRow">

                        <td
                            colspan="5"
                            class="text-center text-slate-400 p-8">

                            No hay productos agregados.

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <div class="grid md:grid-cols-3 gap-6 mt-8">

            <div class="bg-slate-800 rounded-lg p-6">

                <p class="text-slate-400">

                    Productos vendidos

                </p>

                <h2
                    id="totalItems"
                    class="text-3xl font-bold text-white">

                    0

                </h2>

            </div>

            <div class="bg-slate-800 rounded-lg p-6">

                <p class="text-slate-400">

                    Total vendido

                </p>

                <h2
                    id="grandTotal"
                    class="text-3xl font-bold text-green-400">

                    $0.00

                </h2>

            </div>

            <div class="bg-slate-800 rounded-lg p-6">

                <p class="text-slate-400">

                    Ganancia estimada

                </p>

                <h2
                    id="grandProfit"
                    class="text-3xl font-bold text-green-400">

                    $0.00

                </h2>

            </div>

        </div>

        <div id="hiddenInputs"></div>

        <button
            type="submit"
            class="mt-8 bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg transition">

            💾 Guardar venta

        </button>

    </form>

</div>

@endsection

@push('scripts')
<script>

let items = [];

const productSelect = document.getElementById('productSelect');
const quantityInput = document.getElementById('quantity');
const priceInput = document.getElementById('price');

const unitCost = document.getElementById('unitCost');
const unitProfit = document.getElementById('unitProfit');

const saleBody = document.getElementById('saleBody');

const totalItems = document.getElementById('totalItems');
const grandTotal = document.getElementById('grandTotal');
const grandProfit = document.getElementById('grandProfit');

const hiddenInputs = document.getElementById('hiddenInputs');



function updatePrice()
{
    const option = productSelect.options[productSelect.selectedIndex];

    priceInput.value = option.dataset.price;

    calculateUnit();
}



function calculateUnit()
{
    const option = productSelect.options[productSelect.selectedIndex];

    const cost = parseFloat(option.dataset.cost);

    const price = parseFloat(priceInput.value || 0);

    unitCost.innerHTML = '$' + cost.toFixed(2);

    unitProfit.innerHTML = '$' + (price-cost).toFixed(2);
}



productSelect.addEventListener('change',updatePrice);

priceInput.addEventListener('input',calculateUnit);

updatePrice();



document.getElementById('addProduct').addEventListener('click',()=>{

    const option = productSelect.options[productSelect.selectedIndex];

    const id = option.value;

    const quantity = parseFloat(quantityInput.value);

    const price = parseFloat(priceInput.value);

    const cost = parseFloat(option.dataset.cost);

    if(quantity<=0)
    {
        return;
    }

    items.push({

        product_id:id,

        name:option.dataset.name,

        quantity:quantity,

        price:price,

        cost:cost

    });

    renderTable();

});



function renderTable()
{

    saleBody.innerHTML='';

    hiddenInputs.innerHTML='';

    let totalVenta=0;

    let totalGanancia=0;

    let piezas=0;



    if(items.length===0)
    {

        saleBody.innerHTML=

        `<tr id="emptyRow">

            <td colspan="5"
                class="text-center text-slate-400 p-8">

                No hay productos agregados.

            </td>

        </tr>`;

    }



    items.forEach((item,index)=>{

        let total=item.quantity*item.price;

        let ganancia=(item.price-item.cost)*item.quantity;

        piezas+=item.quantity;

        totalVenta+=total;

        totalGanancia+=ganancia;



        saleBody.innerHTML+=`

        <tr class="border-b border-slate-700">

            <td class="p-4">

                ${item.name}

            </td>

            <td class="text-center">

                ${item.quantity}

            </td>

            <td class="text-center">

                $${item.price.toFixed(2)}

            </td>

            <td class="text-center text-green-400 font-bold">

                $${total.toFixed(2)}

            </td>

            <td class="text-center">

                <button
                    type="button"
                    onclick="removeItem(${index})"
                    class="text-red-400 hover:text-red-300">

                    Eliminar

                </button>

            </td>

        </tr>

        `;



        hiddenInputs.innerHTML+=`

        <input
            type="hidden"
            name="products[${index}][product_id]"
            value="${item.product_id}">

        <input
            type="hidden"
            name="products[${index}][quantity]"
            value="${item.quantity}">

        <input
            type="hidden"
            name="products[${index}][price]"
            value="${item.price}">

        `;

    });



    totalItems.innerHTML=piezas;

    grandTotal.innerHTML='$'+totalVenta.toFixed(2);

    grandProfit.innerHTML='$'+totalGanancia.toFixed(2);

}



function removeItem(index)
{

    items.splice(index,1);

    renderTable();

}

</script>
@endpush