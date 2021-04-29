<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    public function index()
    {

//        dd(Auth::user()->roles);
//        return  response(Auth::user()->hasRole('operations_Management'));


        return view('home');
//        if(Auth::user()->hasRole('operations_Management')){
//            return view('operationsManagement/addReport');
//        }
//        elseif (Auth::user()->hasRole('pharmacies_Management')){
//            return view('pharmacyManagement/newReports');
//        }
//        else{
//            return view('auth/login');
//        }


//        if(Auth::user()->roles()->first()->name=="operations_Management"){
//            return view('operationsManagement/addReport');
//        }
//        else{
//            return view('auth/login');
//        }
    }
}
