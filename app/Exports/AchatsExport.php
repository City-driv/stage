<?php

namespace App\Exports;

use App\Models\Achat;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AchatsExport implements FromView
{
    public function __construct(public $userId, public $invoiceType, public $startDate, public $endDate)
    {
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        if (isset($this->startDate) && $this->endDate !=='') {
            $Achats=Achat::where('user_id',$this->userId)->when($this->startDate, function ($query){
                return $query->whereBetween('date', [$this->startDate, $this->endDate]);
            })->get();;
        }else {
            $Achats=Achat::where('user_id',$this->userId)->get();
        }

        if (isset($this->invoiceType) && $this->invoiceType=='facture') {
            if (isset($this->startDate) && $this->endDate !=='') {
                $Achats=Achat::where('user_id',$this->userId)->where('type','Facture')->when($this->startDate, function ($query){
                    return $query->whereBetween('date', [$this->startDate, $this->endDate]);
                })->get();
            }else {
                $Achats=Achat::where('user_id',$this->userId)->where('type','Facture')->get();
            }
        }
        $name = Auth::user()->entreprise_name;
        $TOTAL=$Achats->sum('total');
        $REMISE=$Achats->sum('remiseGlobal');
        $str=$this->startDate;
        $end=$this->endDate;

        return view('main.factures.invoiceAchat',['achats'=>$Achats,'name'=>$name,'TOTAL'=>$TOTAL,'REMISE'=>$REMISE,'startDate'=>$str,'endDate'=>$end]);   
    }
}
