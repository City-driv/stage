<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name'=>$row['name'],
            'adresse'=>$row['adresse'],
            'telephone'=>$row['telephone'],
            'ice'=>$row['ice'],
            'if'=>$row['if'],
            'ville'=>$row['ville'],
            'user_id'=>Auth::user()->id
        ]);
    }
}
