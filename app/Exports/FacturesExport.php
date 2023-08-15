<?php

namespace App\Exports;

use App\Models\Facture;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class FacturesExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Facture::all();
    // }

    public function __construct(public $userId, public $invoiceType, public $startDate, public $endDate)
    {
    }

    public function view(): View
    {
        if ($this->invoiceType == '' || $this->invoiceType == null) {
            $invoices = Facture::where('user_id', $this->userId)->get();
        } else {
            $invoices = Facture::where('user_id', $this->userId)
                ->where('type_fact', $this->invoiceType)
                ->get();
        }

        // if ($this->startDate !== '' && $this->endDate !== '') {
        //     $invoices = Facture::where('user_id', $this->userId)->where('type_fact', $this->invoiceType)
        //         ->when($this->startDate, function ($query) {
        //             return $query->whereBetween('date_facture', [$this->startDate, $this->endDate]);
        //         })->get();
        // }

        $name = Auth::user()->entreprise_name;
        $TTC = $invoices->sum('ttc');
        $TTVA = $invoices->sum('ttva');
        $THT = $invoices->sum('tht');
        $styling = [
            'row' => [
                'font' => ['bold' => true],
                'alignment' => ['center' => true],
            ],
        ];

        return view('main.factures.invoice', [
            'factures' => $invoices,
            'name' => $name,
            'ttc' => $TTC,
            'tva' => $TTVA,
            'tht' => $THT,
            'styling' => $styling,
        ]);
    }
}
