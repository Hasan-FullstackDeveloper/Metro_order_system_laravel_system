<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Role_Model;
use App\Models\Shopkeeper_Model;
use App\Models\City_Model;
use Validator;

class ShopkeeperController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = new Shopkeeper_Model;
        $query = $shop->ShowUser();
        $city = DB::table('tbl_cities')->get();
       
        // dd($city);
        
        return view('Shopkeeper',compact('query','city'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'owner_name' => 'required|max:255',
        //     'name' => 'required|unique:name|max:255',
        //     'city' => 'requireed',

        // ]);
        $data = array(
            'owner_name' => $request->input('owner_name'),
            'name' => $request->input('shop_name'),
            'city' => $request->input('city'),
        );
        $shop = new Shopkeeper_Model;
       $result = $shop->AddShop($data);
    //    dd($result); 
       if($result == false) {
        return redirect()->route('shopkeeper.index')->with('error','Shop Name must be unique!');
       }
       else{
        return redirect()->route('shopkeeper.index')->with('success','Shop Successfully Added');
       }
        // return redirect()->route('shopkeeper.index');
    
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
        //
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
        // dd($id);
        $data = array(
            'owner_name' => $request->input('update_owner_name'),
            'name' => $request->input('shop_name'),
            'city' => $request->input('city'),
        );
        $shop = new Shopkeeper_Model;
      $data['Employee'] = $shop->UpdateShop($data,$id);
      return redirect()->route('shopkeeper.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //   dd($id);
      $shop = new Shopkeeper_Model;
      $data['Employee'] = $shop->DeleteShop($id);
      return redirect()->route('shopkeeper.index');
    }
}
