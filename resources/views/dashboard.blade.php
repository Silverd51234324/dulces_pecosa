@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">


<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
📦 Productos
</h2>

<p class="text-3xl font-bold text-white">
{{ $products }}
</p>

</div>




<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
🏪 Tiendas
</h2>

<p class="text-3xl font-bold text-white">
{{ $stores }}
</p>

</div>





<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
👥 Clientes
</h2>

<p class="text-3xl font-bold text-white">
{{ $customers }}
</p>

</div>




<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
💰 Ventas realizadas
</h2>

<p class="text-3xl font-bold text-white">
{{ $sales }}
</p>

</div>





<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
💵 Inversión
</h2>

<p class="text-3xl font-bold text-red-400">

${{ number_format($totalInvestment,2) }}

</p>

</div>





<div class="bg-slate-800 border border-slate-700 rounded-lg p-5">

<h2 class="text-slate-400">
📈 Rendimiento
</h2>

<p class="text-3xl font-bold text-green-400">

${{ number_format($profit,2) }}

</p>

</div>



</div>



@endsection