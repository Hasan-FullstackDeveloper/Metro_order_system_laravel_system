<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snack_boray_24_pc_Model extends Model
{
    protected $table = 'tbl_snack_boray_24_pc';
    public $timestamps = false;
    use HasFactory;

    function Boaray_insertAndGetId($boray_pac){
        // dd('dafcsvd');
        $id = snack_boray_24_pc_Model::insertGetId($boray_pac);
            return  $id;
    }
    
    function Boaray_updateById($update_boray_pac,$id ){
        snack_boray_24_pc_Model::where('id',$id)->update($update_boray_pac);
        return True;
    }
    function GetBoraydataById($id){
        // dd('dafcsvd');
        $data = snack_boray_24_pc_Model::where('id',$id)->first()   ;
            return  $data;
    }
}
