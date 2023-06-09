<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class nimco_snack_Model extends Model
{
    protected $table = 'tbl_nimco_snack';
    public $timestamps = false;
    use HasFactory;


    function GetOrders()
    {
        $date = date('Y_m_d');
        $tomorrow = date('Y_m_d',strtotime("+1 day"));

        // dd($table);
        $query =   nimco_snack_Model::
        join('tbl_shop','tbl_shop.id', '=' , 'tbl_nimco_snack.shop_id' ,'inner')
        ->join('tbl_snack_nimco_details','tbl_snack_nimco_details.id', '=' , 'tbl_nimco_snack.other_details_id' ,'inner')
        ->join('tbl_nimco_rs_10','tbl_nimco_rs_10.id', '=' , 'tbl_nimco_snack.nimco_order_id' ,'inner')
        ->join('tbl_snacks_rs_10','tbl_snacks_rs_10.id', '=' , 'tbl_nimco_snack.snack_id' ,'inner')
        -> where('added_at',$date )
        ->orWhere('added_at',$tomorrow)
        ->get() ;
        return $query; 
    }


    function GetSnackNimcoOrderDataWithId($id )
    {
    //   dd($id);
      
    $data =   nimco_snack_Model::
    join('tbl_shop','tbl_shop.id', '=' , 'tbl_nimco_snack.shop_id' ,'inner')
    ->join('tbl_snack_nimco_details','tbl_snack_nimco_details.id', '=' , 'tbl_nimco_snack.other_details_id' ,'inner')
    ->join('tbl_nimco_rs_10','tbl_nimco_rs_10.id', '=' , 'tbl_nimco_snack.nimco_order_id' ,'inner')
    ->join('tbl_snacks_rs_10','tbl_snacks_rs_10.id', '=' , 'tbl_nimco_snack.snack_id' ,'inner')
    ->where('tbl_nimco_snack.order_id',$id )
      ->first() ;
      return $data; 

    }
    function snack_nimco_OrderInser($add_order )
    {
        // dd($table);
        $query =   nimco_snack_Model::insert($add_order) ;
        return true; 
    }
    function  GetOrderTableData($id ) 
    {
        $query =   nimco_snack_Model::where('order_id',$id)->first() ;
        return $query; 
    }

    public function  Snack_Order_updateById($update_order,$id ){
        nimco_snack_Model::where('order_id',$id)->update($update_order);
        return true;
    }

    function Snack_OrderDelete($order_id )
    {
        // dd($id);
        $getdata =   nimco_snack_Model::
        where('order_id', $order_id)->first() ;
        // dd($getdata->other_details_id);
        DB::table('tbl_snack_nimco_details')-> where('id', $getdata->other_details_id)->delete();
        DB::table('tbl_nimco_rs_10')-> where('id', $getdata->nimco_order_id)->delete();
        DB::table('tbl_snacks_rs_10')-> where('id', $getdata->snack_id)->delete();
        nimco_snack_Model::where('order_id', $order_id)->delete();

                // dd($getdata);

        return true; 
    }
}
