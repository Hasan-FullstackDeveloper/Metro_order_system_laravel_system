<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_nimco_boray_details_Model extends Model
{
    protected $table = 'tbl_nimco_boray_details';
    public $timestamps = false;
    use HasFactory;


function details_insertAndGetId($details){
    // dd($details );
    $id = tbl_nimco_boray_details_Model::insertGetId($details);
        return  $id;
}

    function details_UpdateById($update_details, $id)
    {

        tbl_nimco_boray_details_Model::where('id',$id)->update($update_details);
        return True;
    }
    function GetDetaialsDataById($id){

        $data = tbl_nimco_boray_details_Model::where('id',$id)->first()   ;
        // $data = toArray($query) ;
        
        return  $data;
        ;
    }

}
