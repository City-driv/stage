<?php

namespace App\Imports;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticlesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'description' =>$row['description'],
            'price' =>$row['price'],
            'quantite' =>$row['quantite'],
            'tva'=>$row['tva'],
            'user_id'=>Auth::user()->id
        ]);
    }
}