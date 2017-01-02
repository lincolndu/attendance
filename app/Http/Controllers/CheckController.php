<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Check;
use Validator;
use App\Http\Requests\CheckRequest;
use Session;
use Carbon\Carbon;
use Auth;

class CheckController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect('/');
        }else{
            $check = Check::where('user_id', Auth::id())->orderBy('id','desc')->first();
        }

        return view('dashboard.check', get_defined_vars());
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Check $check, CheckRequest $request)
    {
        // logged user id
        $logged_user=Auth::id();
        // request value
        $data = $request->all();
        $data['user_id'] = $logged_user;
        $check_user = $check->where('user_id',$logged_user)->orderBy('id','desc')->first(); //logged user check info

        if ($request->check_in == 1) {
            $data['check_in']= Carbon::now();
            $check->create($data);

            Session::flash('success_msg', 'Successfully Checked in.');           
        }elseif ( $request->check_out == 2 && $check_user->check_out =='' ) {
            $inTime= new Carbon($check_user->check_in);
            $now = $data['check_out']= Carbon::now();
            $data['check_time'] =$now->diffInMinutes($inTime);
            $check_user->update($data);
            
            Session::flash('success_msg', 'Successfully Cehcked out.');
        }

        return view('dashboard.success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Check $check)
    {
        return view('check.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Check $check, CheckRequest $request)
    {
        // logged user role
        $logged_user=Auth::user()->role;
        if ($logged_user == 'admin') {
            // request value
            $data = $request->all();

            $inTime= new Carbon($data['check_in']);
            $outTime= new Carbon($data['check_out']);
            $data['check_time'] =$outTime->diffInMinutes($inTime);
            $check->update($data);
            
            Session::flash('success_msg', 'Successfully Cehcked out.');
        }
            Session::flash('error_msg', 'Only Admin can edit.');       
            return redirect('statistics');
    }


}
