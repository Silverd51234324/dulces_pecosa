<?php

namespace App\Http\Controllers;


use App\Models\Finance;
use Illuminate\Http\Request;


class FinanceController extends Controller
{


    public function index()
    {

        $finances = Finance::orderByDesc('date')
            ->get();


        return view(
            'finances.index',
            compact('finances')
        );

    }




    public function create()
    {

        return view(
            'finances.create'
        );

    }

    public function update(Request $request, Finance $finance)
{
    $data = $request->validate([
        'date' => 'required|date',
        'investment' => 'required|numeric',
        'manual_recovery' => 'required|numeric',
        'notes' => 'nullable|string',
    ]);

    $finance->update($data);

    return redirect()
        ->route('finances.index')
        ->with('success','Registro actualizado correctamente');
}




    public function store(Request $request)
    {


        $data = $request->validate([

    'date'
        => 'required|date',

    'investment'
        => 'required|numeric',

    'manual_recovery'
        => 'required|numeric',

    'notes'
        => 'nullable|string'

]);



        Finance::create($data);



        return redirect()
            ->route('finances.index');


    }

    public function edit(Finance $finance)
{
    return view('finances.edit', compact('finance'));
}

public function destroy(Finance $finance)
{
    $finance->delete();

    return redirect()
        ->route('finances.index')
        ->with('success','Registro eliminado correctamente');
}


}