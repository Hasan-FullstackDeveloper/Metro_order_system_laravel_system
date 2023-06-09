<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_Model extends Model
{
    protected $table = 'tbl_user_role';
    protected $primary_key = 'id';

    use HasFactory;

function AssingRoleToUser($data){
    // dd($data["user_id"]);
    // dd($data["role_id"]);


       
       $query = Role_Model::where([
        ['user_id',$data['user_id'] ],
        ['role_id',$data['role_id'] ],
        ])->count();
       
        if( $query == '0')
    {
        Role_Model::insert($data);
        return True;
    }
    else{
        return false;
      
    }
     
// 
    //    $query->toSql();
     
       return True;
}

}
