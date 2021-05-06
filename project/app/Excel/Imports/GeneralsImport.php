<?php

namespace App\Excel\Imports;

use App\Models\General;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GeneralsImport implements ToModel, WithHeadingRow{
  public function model(array $row){
    return new General([
        'id'=>$row['id'],
        'kbn'=>$row['kbn'],
        'code'=>$row['code'],
        'value'=>$row['value'],
        'sort_no'=>$row['sort_no'],
        'changeable'=>$row['changeable'],
        'created_at'=>$row['created_at'],
        'updated_at'=>$row['updated_at'],
        'deleted_at'=>$row['deleted_at'],
    ]);
  }

  public function headingRow() : int{
    return 1;
  }
}