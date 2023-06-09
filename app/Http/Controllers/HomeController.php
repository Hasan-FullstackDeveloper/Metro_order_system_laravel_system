<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Role_Model;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id  = auth()->user()->id;
        // dd($id);

        $query = Role_Model::select('*')
        ->join('users','users.id','=','tbl_user_role.user_id','inner')
        ->join('tbl_role','tbl_user_role.role_id','=','tbl_role.id','inner')
        ->where('users.id','=', $id )->get();
        // dd($query);

        if(!empty($query))
        {
            foreach ($query as $key => $role)
            {        
                // dd($role->role_id);

                if($role->role_id == '1')
                {
                    $request->session()->put('1',$role->user_role);
                }

                elseif($role->role_id== '2')
                {
                    $request->session()->put('2',$role->user_role);
                }

                elseif($role->role_id== '3')
                {
                    $request->session()->put('3',$role->user_role);
                } 

            }
            return view('dashboard');
        }

        else
        {
            return redirect('/login')->back()->with('error', 'Role not assign contact adminiatration');  
        
        }
        
    }
    
    // public function aa() {
    //     dd('sdfvs');
       
    //   }
}
