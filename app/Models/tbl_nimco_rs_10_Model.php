<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_nimco_rs_10_Model extends Model
{
    protected $table = 'tbl_nimco_rs_10';
    public $timestamps = false;
    use HasFactory;


    function Nimco_10_insertAndGetId($nimco_10){
        // dd('dafcsvd');
        $id = tbl_nimco_rs_10_Model::insertGetId($nimco_10);
            return  $id;
    }

  public  function  nimco_10_updateById($nimco_10,$id)
  {
    tbl_nimco_rs_10_Model::where('id',$id)->update($nimco_10);
        return True;
  }

  public function Get_Nimco_10_dataById($id)
  {
    $data = tbl_nimco_rs_10_Model::where('id',$id)->first()   ;
    return  $data;
  }
}
