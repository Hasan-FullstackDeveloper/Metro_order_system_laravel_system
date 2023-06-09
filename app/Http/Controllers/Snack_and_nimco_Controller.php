<?php

namespace App\Http\Controllers;

use App\Models\Shopkeeper_Model;
use App\Models\nimco_snack_Model;
use App\Models\snack_nimco_details_Model;
use App\Models\tbl_nimco_rs_10_Model;
use App\Models\snacks_rs_10_Model;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Snack_and_nimco_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $order = new  nimco_snack_Model;
        $result = $order->GetOrders(); 
        return view('snack__and_nimco',compact('result'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $shop = new Shopkeeper_Model;
        $result = $shop->ShowUser();
        return view('Snack_and_nimco_add',compact('result'));
        
    }
    // public function  GetShopName($id)
    // {  
    //     dd($id);
    //     $shop = new Shopkeeper_Model;
    //     $result = $shop->GetShop($id);
    //     return response()->json($result);        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    $other_details = new snack_nimco_details_Model;
    $details_id = $other_details->snacks_details_insertAndGetId($details );
    // dd($details_id);
    $nimco_10 = array(
        'speical_mix_beg' =>  $request->input('speical_mix_beg'),
        'daal_moth_beg' =>  $request->input('daal_moth_beg'),
        'speical_mix_ctn' =>  $request->input('speical_mix_ctn'),
        'daal_moth_ctn' =>  $request->input('daal_moth_ctn'),
    );

    $nimco_details = new tbl_nimco_rs_10_Model;
    $nimco_id = $nimco_details->Nimco_10_insertAndGetId($nimco_10 );
    // dd($nimco_id);

    $snack_10 = array(
        'ringoes_cheese' => $request->input('ringoes_cheese'),
        'puffz' => $request->input('puffz'),
        'yoyo_yellow' => $request->input('yoyo_yellow'),
        'yoyo_red' => $request->input('yoyo_red'),
        'cnw_chic' => $request->input('cnw_chic'),

    );

    $snack_details = new snacks_rs_10_Model;
    $snack_id = $snack_details->snack_insertAndGetId($snack_10 );
    // dd($snack_id);
    $date = date('Y_m_d');
    // dd($date);

    $add_order = array(
        'shop_id' => $data_shop->id,
        'other_details_id' => $details_id,
        'nimco_order_id' => $nimco_id,
        'snack_id' => $snack_id,
        'added_at' => $date,
    ); 
    // dd($add_order);
    $order_details = new nimco_snack_Model;
     $order_details->snack_nimco_OrderInser($add_order );
        // dd('fvsd');
        return redirect()->route('snack_and_nimco.index')->with('success','Order Successfully Added');

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
        $order_details = new nimco_snack_Model;
        $result =  $order_details->GetSnackNimcoOrderDataWithId($id );

        $shop = new Shopkeeper_Model;
        $shop_result = $shop->ShowUser();

        return view('snack_and_nimco_update',compact('result','shop_result'));
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
        $order_details = new nimco_snack_Model;
        $result =  $order_details->GetOrderTableData($id );
    //    dd($result);
    $update_details = array(     
        'rate' =>$request->input('rate'),
        'bilty' => $request->input('bilty'),
        'c_o' => $request->input('c_o'),
        'transport' => $request->input('transport'),
        'ctn' => $request->input('ctn')

    );    

    $other_details = new snack_nimco_details_Model;
     $other_details->details_UpdateById($update_details, $result->other_details_id);
    $nimco_10 = array(
        'speical_mix_beg' =>  $request->input('speical_mix_beg'),
        'daal_moth_beg' =>  $request->input('daal_moth_beg'),
        'speical_mix_ctn' =>  $request->input('speical_mix_ctn'),
        'daal_moth_ctn' =>  $request->input('daal_moth_ctn'),
    );
    // dd($nimco_10);
    $nimco_details = new tbl_nimco_rs_10_Model;
     $nimco_details->nimco_10_updateById($nimco_10,$result->nimco_order_id);
    // dd($nimco_id);

    $snack_10 = array(
        'ringoes_cheese' => $request->input('ringoes_cheese'),
        'puffz' => $request->input('puffz'),
        'yoyo_yellow' => $request->input('yoyo_yellow'),
        'yoyo_red' => $request->input('yoyo_red'),
        'cnw_chic' => $request->input('cnw_chic'),

    );
        // dd($snack_10);
    // dd($result->boray_pac_id);

    $boaray_details = new snacks_rs_10_Model;
     $boaray_details->snack_10_updateById($snack_10,$result->snack_id );
    // dd($boaray_id);
    // dd($date);

    $update_order = array(
        'shop_id' => $request->input('name'),
    );
            // dd($update_order);

    $order_details = new nimco_snack_Model;
     $order_details->Snack_Order_updateById($update_order,$id );
     return redirect()->route('snack_and_nimco.index')->with('success','Order Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_order = new nimco_snack_Model;
        $delete_order->Snack_OrderDelete($id );
        return redirect()->route('snack_and_nimco.index')->with('success','Order Successfully Delete');


    }


    function update_snack_order($id, Request $request)
    {
        // dd($id);
        $order_details = new nimco_snack_Model;
        $result =  $order_details->GetOrderTableData($id );

        $nimco_details = new tbl_nimco_rs_10_Model;
        $nim_details  = $nimco_details->Get_Nimco_10_dataById($result->nimco_order_id);

        $snack_details = new snacks_rs_10_Model;
        $snack_detail =  $snack_details->Get_Snack_10_dataById($result->snack_id);

        $other_details = new snack_nimco_details_Model;
        $details_data = $other_details->GetSnackDetailsDataById( $result->other_details_id);

        $details = array(     
            'rate' => $details_data->rate,
            'bilty' => $details_data->bilty,
          'c_o' => $details_data->c_o,
          'transport' => $details_data->transport,
          'ctn' => $details_data->ctn,
  
        );
        // dd($details);
        $details_id = $other_details->snacks_details_insertAndGetId($details);
            // dd($details_id);

         $update_nimco_10 = array(
                'speical_mix_beg' => $speical_mix_beg = $request->input('update_speical_mix_beg'),
                'daal_moth_beg' => $daal_moth_beg =  $request->input('update_daal_moth_beg'),
                'speical_mix_ctn' => $speical_mix_ctn =  $request->input('update_speical_mix_ctn'),
                'daal_moth_ctn' => $daal_moth_ctn = $request->input('update_daal_moth_ctn'),
            );  
            
           
            $nimco_details->nimco_10_updateById($update_nimco_10,$result->nimco_order_id);
            
            $update_snack = array(
                'ringoes_cheese' => $ringoes_cheese = $request->input('update_ringoes_cheese'),
                'puffz' => $puffz = $request->input('update_puffz'),
                'yoyo_yellow' => $yoyo_yellow = $request->input('update_yoyo_yellow'),
                'yoyo_red' => $yoyo_red = $request->input('update_yoyo_red'),
                'cnw_chic' => $cnw_chic = $request->input('update_cnw_chic'),
            );  

           
            $snack_details->snack_10_updateById($update_snack, $result->snack_id );
            
            
            
            $insert_speical_mix_beg = empty($speical_mix_beg) ? $nim_details->speical_mix_beg  : "";
            $insert_daal_moth_beg = empty($daal_moth_beg) ? $nim_details->daal_moth_beg  : "";
            $insert_speical_mix_ctn= empty($speical_mix_ctn) ? $nim_details->speical_mix_ctn  : "";
            $insert_daal_moth_ctn = empty($daal_moth_ctn) ? $nim_details->daal_moth_ctn  : "";

            $insert_ringoes_cheese = empty($ringoes_cheese) ? $snack_detail->ringoes_cheese  : "";
            $insert_puffz = empty($puffz) ? $snack_detail->puffz  : "";
            $insert_yoyo_yellow = empty($yoyo_yellow) ? $snack_detail->yoyo_yellow  : "";
            $insert_yoyo_red = empty($yoyo_red) ? $snack_detail->yoyo_red  : "";
            $insert_cnw_chic = empty($cnw_chic) ? $snack_detail->cnw_chic  : "";

            $insert_nimco_10 = array(
                
                'speical_mix_beg' => (int) $insert_speical_mix_beg,
                'daal_moth_beg' => (int)$insert_daal_moth_beg, 
                'speical_mix_ctn' => (int) $insert_speical_mix_ctn, 
                'daal_moth_ctn' => (int)  $insert_daal_moth_ctn,  
            );
            // dd($insert_nimco_5);
            $nimco_id = $nimco_details->Nimco_10_insertAndGetId($insert_nimco_10 );


            

            $insert_snack_10 = array(
                'ringoes_cheese' =>(int) $insert_ringoes_cheese, 
                'puffz' =>(int) $insert_puffz, 
                'yoyo_yellow' =>(int) $insert_yoyo_yellow, 
                'yoyo_red' =>(int) $insert_yoyo_red, 
                'cnw_chic' =>(int) $insert_cnw_chic, 
            );  
            // dd($insert_boray_pac); dd();
            // $boaray_details = new snack_boray_24_pc_Model;
            $snack_id = $snack_details->snack_insertAndGetId($insert_snack_10 );





            $date = date('Y-m-d',strtotime("+1 day"));
            $add_order = array(
                'shop_id' => $result->shop_id,
                'other_details_id' => $details_id,
                'nimco_order_id' => $nimco_id,
                'snack_id' => $snack_id,
                'added_at' => $date,
            );
            // $order_details = new Order_boray_nimco_Model;
             $order_details->snack_nimco_OrderInser($add_order);
            // var_dump($date);
            // dd();


            return redirect()->route('snack_and_nimco.index')->with('success','Order details Successfully Update');
        }
}
