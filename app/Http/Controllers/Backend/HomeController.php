<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index(){

        return view('backend.home');
    }

    public function signup()
    {
        return view('backend.signup');
    }

    public function admins()
    {
        return view('backend.admins', ['admins' => Admin::all()->map(fn($data)=> $data->username)]);
    }

    public function register(Request $request)
    {
        $request->offsetSet('password', Hash::make($request->password));

        if(Admin::create($request->all())) {

            return view('backend.home');
        }
    }

    public function login()
    {
        return view('backend.login');
    }

    public function checkLogin(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if(auth('backend')->attempt($credentials)){

            return redirect()->route('backend.index');
        }

        return back()->withErrors(['Username Or Password Was Incorrect!']);
    }

    public function logout()
    {
        auth('backend')->logout();
        return Redirect()->route('backend.login');
    }
}
