<?php

namespace App\Http\Controllers;
use App\Models\Shopkeeper_Model;
use App\Models\Order_boray_nimco_Model;
use App\Models\tbl_nimco_boray_details_Model;
use App\Models\nimco_rs_5_Model;
use App\Models\snack_boray_24_pc_Model;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

use Illuminate\Http\Request;

class User_Order_boray_nimco_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $has = '';
        // $date =Carbon::now('Europe/London')->startOfDay()->format('d_m_Y');
        // $tableName = "tbl_boray_nimco_".  $date;
       
        $order = new  Order_boray_nimco_Model;
        $result = $order->GetOrders();  
        // dd($result);
        return view('nimco_boray_order',compact('result'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = new Shopkeeper_Model;
        $result = $shop->ShowUser();
        // dd($result['0']['name']);
        return view('Order_boray_nimco_add',compact('result'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $date = date('d-m-y');
        // $tableName = "tbl_boray_nimco_".  $date;
        // Schema::hasTable($tableName );
        // Schema::create($tableName,function($table)  
        // {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('city');
        //     $table->int('other_details_id');
        //     $table->int('nimco_order_id');
        //     $table->int('boray_pac_id');

        // });
       $shop_id = $request->input('name');

        $shop = new Shopkeeper_Model;
        $data_shop = $shop->FindShopDetailsByID($shop_id);
   
    // dd($data);

    $details = array(     
        'rate' =>$request->input('rate'),
        'bilty' => $request->input('bilty'),
        'c_o' => $request->input('c_o'),
        'transport' => $request->input('transport'),
        'ctn' => $request->input('ctn')

    );
    $other_details = new tbl_nimco_boray_details_Model;
    $details_id = $other_details->details_insertAndGetId($details );
    // dd($details_id);
    $nimco_5 = array(
        'mix' =>  $request->input('mix'),
        'daal_moth' =>  $request->input('daal_moth'),
        'daal_chana' =>  $request->input('daal_chana'),
        'specal_mix' =>  $request->input('specal_mix'),
    );

    $nimco_details = new nimco_rs_5_Model;
    $nimco_id = $nimco_details->Nimco_insertAndGetId($nimco_5 );
    // dd($nimco_id);

    $boray_pac = array(
        'chat' => $request->input('chat'),
        'chatni' => $request->input('chatni'),
    );

    $boaray_details = new snack_boray_24_pc_Model;
    $boaray_id = $boaray_details->Boaray_insertAndGetId($boray_pac );
    // dd($boaray_id);
    $date = date('Y_m_d');
    // dd($date);

    $add_order = array(
        'shop_id' => $data_shop->id,
        'other_details_id' => $details_id,
        'nimco_order_id' => $nimco_id,
        'boray_pac_id' => $boaray_id,
        'added_at' => $date,
    );
    $order_details = new Order_boray_nimco_Model;
     $order_details->OrderInser($add_order );
        // dd('fvsd');
        return redirect()->route('Order_boray_nimco.index')->with('success','Order Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $order_details = new Order_boray_nimco_Model;
     $result =  $order_details->GetOrderDataWithId($id );

     $shop = new Shopkeeper_Model;
     $shop_result = $shop->ShowUser();

     return view('Order_boray_nimco_update',compact('result','shop_result'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $order_details = new Order_boray_nimco_Model;
        $result =  $order_details->GetOrderTableData($id );
       
    $update_details = array(     
        'rate' =>$request->input('rate'),
        'bilty' => $request->input('bilty'),
        'c_o' => $request->input('c_o'),
        'transport' => $request->input('transport'),
        'ctn' => $request->input('ctn')

    );
    $other_details = new tbl_nimco_boray_details_Model;
    $details_id = $other_details->details_UpdateById($update_details, $result->other_details_id);
    // dd($details_id);
    $update_nimco_5 = array(
        'mix' =>  $request->input('mix'),
        'daal_moth' =>  $request->input('daal_moth'),
        'daal_chana' =>  $request->input('daal_chana'),
        'specal_mix' =>  $request->input('specal_mix'),
    );

    $nimco_details = new nimco_rs_5_Model;
    $nimco_id = $nimco_details->Nimco_updateById($update_nimco_5,$result->nimco_order_id);
    // dd($nimco_id);

    $update_boray_pac = array(
        'chat' => $request->input('chat'),
        'chatni' => $request->input('chatni'),
    );  
        // dd($update_boray_pac);
    // dd($result->boray_pac_id);

    $boaray_details = new snack_boray_24_pc_Model;
    $boaray_id = $boaray_details->Boaray_updateById($update_boray_pac,$result->boray_pac_id );
    // dd($boaray_id);
    // dd($date);

    $update_order = array(
        'shop_id' => $request->input('name'),
    );
    $order_details = new Order_boray_nimco_Model;
     $order_details->Order_updateById($update_order,$id );
     return redirect()->route('Order_boray_nimco.index')->with('success','Order Successfully Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $delete_order = new Order_boray_nimco_Model;
        $delete_order->OrderDelete($id );
        return redirect()->route('Order_boray_nimco.index')->with('success','Order Successfully Delete');

    }




    function update_order($id, Request $request)
    {
        $order_details = new Order_boray_nimco_Model;
        $result =  $order_details->GetOrderTableData($id );

        $nimco_details = new nimco_rs_5_Model;
        $nim_details  = $nimco_details->GetNimcodataById($result->nimco_order_id);

        $boray_details = new snack_boray_24_pc_Model;
        $bory_details =  $boray_details->GetBoraydataById($result->boray_pac_id);

        $other_details = new tbl_nimco_boray_details_Model;
        $details_data = $other_details->GetDetaialsDataById( $result->other_details_id);

        $details = array(     
            'rate' => $details_data->rate,
            'bilty' => $details_data->bilty,
          'c_o' => $details_data->c_o,
          'transport' => $details_data->transport,
          'ctn' => $details_data->ctn,
  
        );
      
        $details_id = $other_details->details_insertAndGetId($details);
          

         $update_nimco_5 = array(
                'mix' => $mix = $request->input('update_mix'),
                'daal_moth' => $daal_moth =  $request->input('update_daal_moth'),
                'daal_chana' => $daal_chana =  $request->input('update_daal_chana'),
                'specal_mix' => $specal_mix = $request->input('update_specal_mix'),
            );  
            
       
            $nimco_details->Nimco_updateById($update_nimco_5,$result->nimco_order_id);
            
            $update_boray_pac = array(
                'chat' => $chat = $request->input('update_chat'),
                'chatni' => $chatni = $request->input('update_chatni'),
            );  

           
            $boray_details->Boaray_updateById($update_boray_pac, $result->boray_pac_id );
            
            
          
        
            
            $insert_mix = empty($mix) ? $nim_details->mix  : "";
            $insert_daal_moth = empty($daal_moth) ? $nim_details->daal_moth  : "";
            $insert_daal_chana = empty($daal_chana) ? $nim_details->daal_chana  : "";
            $insert_specal_mix = empty($specal_mix) ? $nim_details->specal_mix  : "";

            $insert_chat = empty($chat) ? $bory_details->chat  : "";
            $insert_chatni = empty($chatni) ? $bory_details->chatni  : "";


            $insert_nimco_5 = array(
                
                'mix' => (int) $insert_mix,
                'daal_moth' => (int)$insert_daal_moth, 
                'daal_chana' => (int) $insert_daal_chana, 
                'specal_mix' => (int)  $insert_specal_mix,  
            );
        
            $nimco_details = new nimco_rs_5_Model;
            $nimco_id = $nimco_details->Nimco_insertAndGetId($insert_nimco_5 );



            $insert_boray_pac = array(
                'chat' =>(int) $insert_chat, 
                'chatni' =>(int) $insert_chatni, 
            );  
          
            $boaray_id = $boray_details->Boaray_insertAndGetId($insert_boray_pac );





            $date = date('Y-m-d',strtotime("+1 day"));
            $add_order = array(
                'shop_id' => $result->shop_id,
                'other_details_id' => $details_id,
                'nimco_order_id' => $nimco_id,
                'boray_pac_id' => $boaray_id,
                'added_at' => $date,
            );
             $order_details->OrderInser($add_order);


            return redirect()->route('Order_boray_nimco.index')->with('success','Order details Successfully Update');
    
    }

}
