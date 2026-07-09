@extends('layouts.app')


@section('content')


<div class="max-w-5xl mx-auto py-6">


<h1 class="text-2xl font-bold mb-4">

Compra del {{ $purchase->purchase_date }}

</h1>



<div class="bg-white shadow rounded p-5 mb-5">


<p>

Notas:

{{ $purchase->notes }}

</p>


<p class="mt-2 font-bold">

Total:

${{ number_format($purchase->total,2) }}

</p>


</div>




<div class="bg-white shadow rounded">

<form 
action="{{ route('purchase_details.store',$purchase) }}"
method="POST"
class="bg-white shadow rounded p-5 mb-5">


@csrf


<h2 class="font-bold mb-4">
Agregar producto
</h2>



<select
name="product_id"
class="border rounded p-2 w-full mb-3">


@foreach(\App\Models\Product::where('active',true)->get() as $product)


<option value="{{ $product->id }}">

{{ $product->name }}

</option>


@endforeach


</select>




<input
type="number"
step="0.01"
name="quantity"
placeholder="Cantidad"
class="border rounded p-2 w-full mb-3">



<input
type="text"
name="unit"
placeholder="kg, g, pieza"
class="border rounded p-2 w-full mb-3">



<input
type="number"
step="0.01"
name="unit_price"
placeholder="Precio"
class="border rounded p-2 w-full mb-3">



<button
class="bg-green-600 text-white px-5 py-2 rounded">

Agregar

</button>


</form>


<table class="w-full">


<thead>

<tr class="border-b">


<th class="p-3">
Producto
</th>


<th>
Cantidad
</th>


<th>
Unidad
</th>


<th>
Precio
</th>


<th>
Subtotal
</th>


</tr>

</thead>



<tbody>


@foreach($purchase->details as $detail)


<tr class="border-b">


<td class="p-3">

{{ $detail->product->name }}

</td>


<td class="text-center">

{{ $detail->quantity }}

</td>


<td class="text-center">

{{ $detail->unit }}

</td>


<td class="text-center">

${{ $detail->unit_price }}

</td>


<td class="text-center">

${{ $detail->subtotal }}

</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


@endsection