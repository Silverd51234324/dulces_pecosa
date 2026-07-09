@extends('layouts.app')


@section('content')


<div class="max-w-3xl mx-auto py-6">


<h1 class="text-2xl font-bold mb-6">
Nueva Compra
</h1>



<form action="{{ route('purchases.store') }}"
method="POST">


@csrf



<div class="bg-white shadow rounded p-6 space-y-4">


<div>

<label class="block">
Fecha compra
</label>


<input
type="date"
name="purchase_date"
value="{{ date('Y-m-d') }}"
class="w-full border rounded p-2">


</div>




<div>

<label class="block">
Notas
</label>


<textarea
name="notes"
class="w-full border rounded p-2"></textarea>


</div>




<button
class="bg-green-600 text-white px-5 py-2 rounded">

Crear compra

</button>



</div>



</form>



</div>


@endsection