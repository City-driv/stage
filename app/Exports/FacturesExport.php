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
        }elseif ($this->invoiceType == 'mvs') {
            if ($this->startDate !== '' && $this->endDate !== null) {
                $invoices = Facture::where('user_id', $this->userId)
                ->whereIn('type_fact',['facture','bon_livraison','bon_cmd','bon',])
                ->when($this->startDate, function ($query) {
                    return $query->whereBetween('date_facture', [$this->startDate, $this->endDate]);
                })->get();
            }else {
                $invoices = Facture::where('user_id', $this->userId)
                    ->whereIn('type_fact',['facture','bon_livraison','bon_cmd','bon',])
                    ->get();
            }
        } else {
            $invoices = Facture::where('user_id', $this->userId)
                ->where('type_fact', $this->invoiceType)
                ->get();
        }

        // if ($this->startDate !== '' && $this->endDate !== null) {
        //     if (isset($this->invoiceType) && $this->invoiceType!=='') {
        //         $invoices = Facture::where('user_id', $this->userId)->where('type_fact', $this->invoiceType)
        //             ->when($this->startDate, function ($query) {
        //                 return $query->whereBetween('date_facture', [$this->startDate, $this->endDate]);
        //             })->get();
        //     }elseif ($this->invoiceType=='mvs') {
        //         $invoices = Facture::where('user_id', $this->userId)
        //         ->whereIn('type_fact',['facture','bon_livraison','bon_cmd','bon',])
        //         ->when($this->startDate, function ($query) {
        //             return $query->whereBetween('date_facture', [$this->startDate, $this->endDate]);
        //         })->get();
        //     }
        // }

        $name = Auth::user()->entreprise_name;
        $TTC = $invoices->sum('ttc');
        $TTVA = $invoices->sum('ttva');
        $THT = $invoices->sum('tht');
        $std=$this->startDate;
        $end=$this->endDate;
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
            'startDate'=>$std,
            'endDate'=>$end
        ]);
    }
}
