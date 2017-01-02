<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Check;
use Carbon\Carbon;
use Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logged_id= Auth::id();

        $check= Check::select('check_in', 'check_out')
                        ->where('user_id', $logged_id)
                        ->orderBy('id','desc')
                        ->first();

        $today = date('Ydm');

        if(count($check)>0){
           $check_in= date('Ydm', strtotime($check->check_in));
            if ( $today != $check_in && Auth::user()->role != 'admin') {
                return redirect('check');
            } 
        }
        

        $users= User::orderBy('id', 'desc')->get();

        return view('dashboard.home', get_defined_vars());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $users= User::orderBy('id', 'desc')->get();

        return view('dashboard.settings', get_defined_vars());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_login($id)
    {
        Auth::loginUsingId($id);

        return redirect('/');
    }



}
