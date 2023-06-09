<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Order_boray_nimco_Model extends Model
{       
  
    // function tablename(){
    //     // $date = date('d-m-y');
    //     // $tableName = "tbl_boray_nimco_".  $date;
    // $data =  Carbon::now('Europe/London')->startOfDay()->format('d_m_Y');
    // return "tbl_boray_nimco_". $data ;
    // }

     protected $table = 'tbl_boray_nimco';
     public $timestamps = false;
    use HasFactory;
    
    
    function GetOrders()
    {
        $date = date('Y_m_d');
        $tomorrow = date('Y_m_d',strtotime("+1 day"));

        // dd($table);
        $query =   Order_boray_nimco_Model::
        join('tbl_shop','tbl_shop.id', '=' , 'tbl_boray_nimco.shop_id' ,'inner')
        ->join('tbl_nimco_boray_details','tbl_nimco_boray_details.id', '=' , 'tbl_boray_nimco.other_details_id' ,'inner')
        ->join('tbl_nimco_rs_5','tbl_nimco_rs_5.id', '=' , 'tbl_boray_nimco.nimco_order_id' ,'inner')
        ->join('tbl_snack_boray_24_pc','tbl_snack_boray_24_pc.id', '=' , 'tbl_boray_nimco.boray_pac_id' ,'inner')
        -> where('added_at',$date )
        ->orWhere('added_at',$tomorrow)
        ->get() ;
        return $query; 
    }

    function GetOrderDataWithId($id )
    {
    //   dd($id);
      
      $data =   Order_boray_nimco_Model::
      join('tbl_shop','tbl_shop.id', '=' , 'tbl_boray_nimco.shop_id' ,'inner')
      ->join('tbl_nimco_boray_details','tbl_nimco_boray_details.id', '=' , 'tbl_boray_nimco.other_details_id' ,'inner')
      ->join('tbl_nimco_rs_5','tbl_nimco_rs_5.id', '=' , 'tbl_boray_nimco.nimco_order_id' ,'inner')
      ->join('tbl_snack_boray_24_pc','tbl_snack_boray_24_pc.id', '=' , 'tbl_boray_nimco.boray_pac_id' ,'inner')
      -> where('tbl_boray_nimco.order_id',$id )
      ->first() ;
      return $data; 

    }
    
    function OrderInser($add_order )
    {
        // dd($table);
        $query =   Order_boray_nimco_Model::insert($add_order) ;
        return true; 
    }

    function GetOrderTableData($id )
    {
        // dd($id);
        $query =   Order_boray_nimco_Model::where('order_id',$id)->first() ;
        return $query; 
    }
    function OrderDelete($order_id )
    {
        // dd($id);
        $getdata =   Order_boray_nimco_Model::
        where('order_id', $order_id)->first() ;
        // dd($getdata->other_details_id);
        DB::table('tbl_nimco_boray_details')-> where('id', $getdata->other_details_id)->delete();
        DB::table('tbl_nimco_rs_5')-> where('id', $getdata->nimco_order_id)->delete();
        DB::table('tbl_snack_boray_24_pc')-> where('id', $getdata->boray_pac_id)->delete();
        Order_boray_nimco_Model::where('order_id', $order_id)->delete();

                // dd($getdata);

        return true; 
    }

    function  Order_updateById($update_order,$id )
    {
        Order_boray_nimco_Model::where('order_id',$id)->update($update_order);
        return True;
    }
}
