<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\Role_Model;
use App\Models\RoleModel;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        // dd("cxbc"); 
        $user = new UserModel;
        $result = $user->showUser();
       
        $user = new RoleModel;
        $role_result = $user->GetRole();
        // dd($result) ;
        
        return view('User',compact('result','role_result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $password = $request->input('password');
        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('password') ,
        );
        $user = new UserModel;
        $result = $user->AddUser($data);
        // dd($result);
        if($result == false) {
            return redirect()->route('user.index')->with('error','email Name must be unique!');
           }
           else{
            return redirect()->route('user.index')->with('success','user Successfully Added');
           }
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
            'name' => $request->input('name'),
            'email' => $request->input('email')
        );  
        // dd($data);
        $user = new UserModel;
        $result = $user->UpdateeUser($id,$data);
        return redirect()->route('user.index')->with('success','User Successfully  Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("cxbc"); 
        $user = new UserModel;
        $result = $user->DeleteUser($id);
        return redirect()->route('user.index')->with('success','User Deleted Successfully Added');

       
        // dd($result) ;
    }




    public function AssignRole(Request $request)
    {
        // dd("cxbc"); 
        $data = array(
            'user_id' => $request->input('id'),
            'role_id' => $request->input('role')
        );  
        // dd($data); 

        $user = new Role_Model;
        $result = $user->AssingRoleToUser($data);
        // dd($result);
        if($result == false) {
            return redirect()->route('user.index')->with('error','Role Already Assign!');
           }
           else{
            return redirect()->route('user.index')->with('success','Role Assign Successfully ');
           }


       
    }
}
