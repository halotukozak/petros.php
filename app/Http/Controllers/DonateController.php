<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use PDF;
class DonateController extends Controller
{

    public function index()
    {
        return view('donates.index')->with('donations', Donate::orderByDesc('id')->paginate(15));
    }


    public function create()
    {
        return view('donates.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'donor' => 'string|max:255',
            'purpose' => [
                'required',
                Rule::in(['church', 'cemetery'])
            ],
            'memoriam' => 'nullable|string',
            'amount' => 'required'
        ]);
        $donation = Donate::create([
            'donor' => $request->donor,
            'purpose' => $request->purpose,
            'memoriam' => $request->memoriam,
            'amount' => $request->amount
        ]);
        return $this->show($donation);
    }


    public function show(Donate $donate)
    {
        $pdf = PDF::loadView('printouts.receipt', $donate->toArray());

        return $pdf->stream();

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
