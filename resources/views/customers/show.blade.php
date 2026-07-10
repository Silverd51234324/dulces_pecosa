@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6">


<div class="flex justify-between items-center mb-6">


<div>


<a href="{{ route('customers.index') }}"
class="text-slate-400 hover:text-white">

← Volver clientes

</a>


<h1 class="text-3xl font-bold text-white mt-3">

👤 {{ $customer->name }}

</h1>


@if($customer->notes)

<p class="text-slate-400 mt-2">

{{ $customer->notes }}

</p>

@endif


</div>



<a href="{{ route('sales.customer.create',$customer) }}"
class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">

➕ Nueva venta

</a>


</div>





@php


$totalVenta = 0;

$totalGanancia = 0;

$totalProductos = 0;



foreach($customer->sales as $sale)
{

    foreach($sale->details as $detail)
    {


        $totalVenta += 
        $detail->quantity *
        $detail->price;



        $totalGanancia += 
        (
            $detail->price -
            $detail->product->unit_cost
        )
        *
        $detail->quantity;



        $totalProductos +=
        $detail->quantity;


    }

}



@endphp





<div class="grid md:grid-cols-3 gap-5 mb-8">


<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">


<p class="text-slate-400">

Productos vendidos

</p>


<h2 class="text-3xl font-bold text-white">

{{ $totalProductos }}

</h2>


</div>




<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">


<p class="text-slate-400">

Total comprado

</p>


<h2 class="text-3xl font-bold text-green-400">

${{ number_format($totalVenta,2) }}

</h2>


</div>





<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">


<p class="text-slate-400">

Ganancia estimada

</p>


<h2 class="text-3xl font-bold text-green-400">

${{ number_format($totalGanancia,2) }}

</h2>


</div>


</div>







<h2 class="text-2xl font-bold text-white mb-4">

📋 Historial de ventas

</h2>






<div class="space-y-5">


@forelse($customer->sales as $sale)


<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">


<div class="flex justify-between mb-4">


<h3 class="text-xl font-bold text-white">

Venta #{{ $sale->id }}

</h3>

<div class="flex gap-3">


<a href="{{ route('sales.edit',$sale) }}"
class="text-sky-400 hover:text-sky-300">

Editar

</a>



<form action="{{ route('sales.destroy',$sale) }}"
method="POST">


@csrf

@method('DELETE')


<button
onclick="return confirm('¿Eliminar esta venta?')"
class="text-red-400 hover:text-red-300">

Eliminar

</button>


</form>


</div>


<span class="text-slate-400">

{{ $sale->sale_date }}

</span>


</div>






<table class="w-full text-slate-200">


<thead>

<tr class="border-b border-slate-700">


<th class="text-left p-3">

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


</tr>

</thead>




<tbody>


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


${{
number_format(
$detail->quantity *
$detail->price,
2
)
}}


</td>


</tr>


@endforeach


</tbody>


</table>



</div>



@empty


<div class="bg-slate-800 p-8 rounded-lg text-center text-slate-400">

Este cliente todavía no tiene ventas.

</div>


@endforelse


</div>




</div>

@endsection