<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $users = DB::table('users')->get();
        return view("admin/home", ["users" => $users]);
    }

    public function login_view()
    {
        return view("login");
    }

    public function login_post(Request $request)
    {

        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        $data = DB::table('users')->where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('email', $data->email);
                Session::put('login', TRUE);

                return redirect('/');
                
            }
        }
        return redirect('auth/login')->with('message-error', 'Password atau Email Salah!');
   
    }
}
