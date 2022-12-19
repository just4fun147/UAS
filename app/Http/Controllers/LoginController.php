<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{

    public function index(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // if ($user->email_verified_at == NULL) {
            //     return response([
            //         'message' => 'Please Verify Your Email'
            //     ], 401); //Return error jika belum verifikasi email
            // }
 
            return new userResource(true, 'Login Sukses', $user);
        }
 
        return response(['message' => 'Invalid Credentials'], 401);
    
    }
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // if ($user->email_verified_at == NULL) {
            //     return response([
            //         'message' => 'Please Verify Your Email'
            //     ], 401); //Return error jika belum verifikasi email
            // }
 
            return new userResource(true, 'Login Sukses', $user);
        }
 
        return response(['message' => 'Invalid Credentials'], 401);
    
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
