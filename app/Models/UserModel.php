<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';
    use HasFactory;


    function ShowUser(){
        // var_dump('fvbdgfhnfh');
        //         dd($id);
              $query =   UserModel::all();
                return $query;    
     }

     function DeleteUser($id)
        {    
            
        UserModel::find($id)->delete();
        return true;    
        
        }

     function AddUser($data)
        {    
            
            $check['item']  =   UserModel::where('email',$data['email'])->count();  
            //  dd($check);     
        
            if( $check['item'] == '0')
            {
                UserModel::insert($data);
                return True;
            }
            else{
                return false;

            }  
        
        }
    
        function UpdateeUser($id,$data){
            // dd($id);
            UserModel::where('id',$id)->update($data);
        return True;
        }
}

