<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Requests\UserRequest;
use Session;
use Auth;

class UsersController extends Controller
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
        $users= User::get();

        return view('dashboard.users', get_defined_vars());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       return view('dashboard.user_edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UserRequest $request)
    {
         if (Auth::user()->role != 'admin') {
            Session::flash('error_msg', 'Only Admin can update user account.');
            return redirect('users');
        } else {
            //updated user info
            $data['name'] = $request->name;
            if ($request->email != $user->email) {
                $data['email'] = $request->email;
            }
            if ( $request->password != '' ) {
                $data['password'] = bcrypt($request->password);
            }
            $user->update($data);

            Session::flash('success_msg', 'Successfully Updated User.');
            return redirect('/');
        }
    }


}
