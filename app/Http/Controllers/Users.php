<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    
    public function register_view()
    {
        return view("register");
    }

    public function login_post(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = DB::table('users')->where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('image_url', $data->image_url);
                Session::put('login', TRUE);

                return redirect('/home');
                
            }
        }
        return redirect('auth/login')->with('message-error', 'Password atau Email Salah!');
   
    }
    
    public function register_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
            'name' => 'required|min:8|max:64',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $image = $request->file('image');

        $fileNameImage = time() . '-Users-' . $request->book . '.' . $image->getClientOriginalExtension();

        DB::table('users')->insert([
            'name'=> $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'image_url' => $fileNameImage,
            'role' =>'guest_user'
        ]);

        $image->storeAs('public/image', $fileNameImage);

        return redirect('auth/login')->with('message-success', 'Email sudah terdaftar, silahkan login!');
   
    }

    public function logout(Request $request)
    {
        Session::forget('id');
        Session::forget('name');
        Session::forget('email');
        Session::forget('image_url');
        Session::forget('login');
        return redirect('auth/login');
    }

    public function user_detail(Request $request, $id)
    {
        $user = DB::table('users')->where("id", $id)->first();
        if (!$user) {
            return redirect("home");
        }

        return view("admin/user_detail", ["user" => $user]);
    }

}
