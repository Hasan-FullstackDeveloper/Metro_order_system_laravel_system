<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class snack_nimco_details_Model extends Model
{
    protected $table = 'tbl_snack_nimco_details';
    public $timestamps = false;
    use HasFactory; 

   public function snacks_details_insertAndGetId($details){
        // dd($details );
        $id = snack_nimco_details_Model::insertGetId($details);
            return  $id;
    }

    public   function   details_UpdateById($update_details, $id)
    {
        snack_nimco_details_Model::where('id',$id)->update($update_details);
        return true;
    }


    Function  GetSnackDetailsDataById($id)
    {
        $data = snack_nimco_details_Model::where('id',$id)->first()   ;
        // $data = toArray($query) ;
        
        return  $data;
    }
}
