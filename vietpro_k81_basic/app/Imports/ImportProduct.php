<?php

namespace App\Imports;

use App\Model\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'code'=> $row[0],
            'name'=> $row[1],
            'slug'=> $row[2],
            'price'=> $row[3],
            'featured'=> $row[4],
            'state'=> $row[5],
            'info'=> $row[6],
            'describe'=> $row[7],
            'img'=> $row[8],
            'category_id'=> $row[9],
        ]);
    }
}
