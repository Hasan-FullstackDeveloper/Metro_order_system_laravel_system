<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopkeeper_Model extends Model
{
    protected $table = 'tbl_shop';
    public $timestamps = false;

    // protected $primary_key = 'id';
    use HasFactory;

    public function ShowUser()
    { 
        $query =   Shopkeeper_Model::all();
                return $query;    
     }

     public  function GetShop($id)
     { 
         $query =   Shopkeeper_Model::where('id',$id)->first();
                 return $query;    
      }

      

      public   function DeleteShop($id){
// var_dump('fvbdgfhnfh');
//         dd($id);
        Shopkeeper_Model::find($id)->delete();
        return True;    
    }
   
    public function AddShop($data){
        // dd($data['name']);
    //    $check = Shopkeeper_Model::where('name',$data['name']);
     $check['item']  =   Shopkeeper_Model::where('name',$data['name'])->count();  
    //  dd($check);     

    if( $check['item'] == '0')
    {
        Shopkeeper_Model::insert($data);
        return True;
    }
    else{
        return false;
      
    }

}
public function UpdateShop($data,$id){
        // dd($id);
        Shopkeeper_Model::where('id',$id)->update($data);
        return True;
        // dd($data);

    }

    public  function FindShopDetailsByID($id){
        // dd($id);
       $data =  Shopkeeper_Model::where('id',$id)->first();
        return $data;
        // dd($data->name);

    }
}
