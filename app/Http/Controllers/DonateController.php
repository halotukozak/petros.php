<?php

namespace App\Http\Controllers;

use App\Mail\MonthlyRaport;
use App\Models\Donate;
use Egulias\EmailValidator\Result\Reason\DomainAcceptsNoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use PDF;
use Symfony\Component\Console\Input\Input;

class DonateController extends Controller
{

    public function index()
    {
        Mail::to(auth()->user())->send(new MonthlyRaport());
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
                Rule::in(['church', 'cemetery', 'parish'])
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


    public function destroy($id)
    {
        Donate::find($id)->delete();
        return redirect()->route('donates.index');
    }

    public function delete($id)
    {
        $donation = Donate::find($id);

        return view('donates.destroy', compact('donation'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $start = $request->start;
        $end = $request->end;

        $donations = Donate::whereBetween('created_at', [$start, $end])->where(function ($query) use ($search) {
            $query->where('donor', 'LIKE', "%{$search}%")
                ->orWhere('memoriam', 'LIKE', "%{$search}%")
                ->orWhere('amount', 'LIKE', "%{$search}%");
        })->orderByDesc('id')
            ->paginate(15);

        return view('donates.index', compact(['donations', 'search', 'end', 'start']));
    }

    public function sendReport($month)
    {

    }

    public function report(Request $request)
    {
        isset($request->date) ? $date = $request->date : $date = date('Y-m');
        $records = Donate::whereMonth('created_at', substr($date, 5, 2))->whereYear('created_at', substr($date, 0, 4))->get();
        $churchRecords = $records->where('purpose', 'church');
        $cemeteryRecords = $records->where('purpose', 'cemetery');
        $parishRecords = $records->where('purpose', 'purpose');
        return view('donates.report', compact(['date', 'churchRecords', 'cemeteryRecords', 'parishRecords']));

    }
}
