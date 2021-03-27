<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Laratrust\LaratrustFacade;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function index(){
        if ( LaratrustFacade::hasRole('docteur')) {
              return view('docteur');

        }elseif (LaratrustFacade::hasRole('patient')) {
            $users = DB::table('users')
                         ->join('role_user','users.id','=','role_user.user_id')
                         ->where('role_id','=',2)->get();
              return view('patient' , ['users'=>$users]);

        }elseif(LaratrustFacade::hasRole('administrator')) {
            $users = DB::table('users')
            ->select('name' , 'specialite' , 'email')
                  ->join('role_user','users.id','=','role_user.user_id')
                  ->where('role_id','=',2 )
                  ->orWhere('role_id','=',3)
                  ->groupBy('specialite' , 'name' , 'email')
            ->get();
            
              return view('admin', ['users'=>$users]);
        }
     }

    public function deletePoste(){
          return view('delete');
    }

    
}

