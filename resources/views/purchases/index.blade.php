@extends('layouts.app')


@section('content')


<div class="max-w-5xl mx-auto py-6">


<div class="flex justify-between mb-5">


<h1 class="text-2xl font-bold">
Compras
</h1>


<a href="{{ route('purchases.create') }}"
class="bg-green-600 text-white px-4 py-2 rounded">

Nueva compra

</a>


</div>




@if(session('success'))

<div class="bg-green-100 p-3 mb-4 rounded">

{{ session('success') }}

</div>

@endif




<div class="bg-white shadow rounded">


<table class="w-full">


<thead>

<tr class="border-b">

<th class="p-3">
Fecha
</th>

<th>
Total
</th>

<th>
Acciones
</th>

</tr>

</thead>



<tbody>


@foreach($purchases as $purchase)


<tr class="border-b">


<td class="p-3 text-center">

{{ $purchase->purchase_date }}

</td>


<td class="text-center">

${{ $purchase->total }}

</td>


<td class="text-center">


<a href="{{ route('purchases.show',$purchase) }}"
class="text-blue-600">

Ver

</a>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>



</div>



@endsection