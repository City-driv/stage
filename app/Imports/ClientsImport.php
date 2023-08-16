<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class ClientsImport implements ToModel,WithHeadingRow
class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            // 'name'=>$row['name'],
            // 'adresse'=>$row['adresse'],
            // 'telephone'=>$row['telephone'],
            // 'ice'=>$row['ice'],
            // 'if'=>$row['if'],
            // 'ville'=>$row['ville'],
            // 'user_id'=>Auth::user()->id
            'name'=>$row[0],
            'adresse'=>$row[1],
            'telephone'=>$row[2],
            'ice'=>$row[3],
            'if'=>$row[4],
            'ville'=>$row[5],
            'user_id'=>Auth::user()->id
        ]);
    }
}
