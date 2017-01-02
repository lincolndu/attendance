<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Check;
use Auth;
use Carbon\Carbon;


class StatisticsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // logged user role
        $logged_user_id= Auth::id();
        $logged_user=Auth::user()->role;
        if ($logged_user == 'admin') {
            $users= User::select('name')->orderBy('id','desc')->get();
            $checks= Check::orderBy('id','desc')->get();
        }else{
           $checks= Check::where('user_id', $logged_user_id)->get();
        }
        
        return view('statistics.home', get_defined_vars());
    }


   

}
