<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{

    protected $table = 'tbl_role';
    protected $primary_key = 'id';
    use HasFactory;


    function GetRole(){
        $query =   RoleModel::all();
        // dd($query );
        return $query;    
    }
}
