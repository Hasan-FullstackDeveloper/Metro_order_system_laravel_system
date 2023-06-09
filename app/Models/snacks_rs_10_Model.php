<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snacks_rs_10_Model extends Model
{

    protected $table = 'tbl_snacks_rs_10';
    public $timestamps = false;
    use HasFactory;

    function snack_insertAndGetId($data){
        // dd('dafcsvd');
        $id = snacks_rs_10_Model::insertGetId($data);
            return  $id;
    }
    function  snack_10_updateById($snack_10,$id ){
        snacks_rs_10_Model::where('id',$id)->update($snack_10);
        return true;
    }
    function Get_Snack_10_dataById($id)
    {
        $data = snacks_rs_10_Model::where('id',$id)->first()   ;
        return  $data;
      }
}
