<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nimco_rs_5_Model extends Model
{
    protected $table = 'tbl_nimco_rs_5';
    public $timestamps = false;
    use HasFactory;


    function Nimco_insertAndGetId($nimco_5){
        // dd('dafcsvd');
        $id = nimco_rs_5_Model::insertGetId($nimco_5);
            return  $id;
    }

    function Nimco_updateById($update_nimco_5,$id){
        nimco_rs_5_Model::where('id',$id)->update($update_nimco_5);
        return True;
    }


    function GetNimcodataById($id){
        // dd('dafcsvd');
        $data = nimco_rs_5_Model::where('id',$id)->first()   ;
            return  $data;
    }
}
