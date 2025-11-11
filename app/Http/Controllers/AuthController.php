<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    private function getUsers() : array{
        return[
            [
                'email' => 'admin@123.com',
                // 'password' => 'admin123',
                'password' => '$2y$12$cAtSfJI.Sr1l1dlETRQl1OQtfXT.fuXyezFBzWrccGSzN6EPXJv6m',
                'nama' => 'Admin'
            ],
            [
                'email' => 'user@123.com',
                // 'password' => 'user123',
                'password' => '$2y$12$3VpQeKFE/0U10kdg6C.co.uFAoYXuDCWpveEY7SWXmdzimS5HTZN6',
                'nama' => 'M.Mirza'
            ]
        ];
    }

    // logic untuk memproses login
public function login(Request $request)
{
    $auth = $request->only('email','password');

    foreach($this->getUsers() as $users){
        if(
            $users['email'] == $auth['email']
            && Hash::check($auth['password'], $users['password'])
        ){
            // simpan session
            Session::put('users', $users);

            // langsung redirect ke profil
            return redirect()->route('profil');
        }
    }

    return back()->withErrors(['error' => 'Username/Password Salah!']);
}

public function profil()
{
    if(!Session::has('users')){
        return redirect()->route('home');
    }

    $users = Session::get('users');
    return view('profil', compact('users'));
}

public function logout()
{
    Session::forget('users');
    return redirect()->route('user.beranda'); // kembali ke halaman user
}



}


