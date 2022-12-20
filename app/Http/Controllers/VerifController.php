<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; 
use App\Mail\VerifMail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
class VerifController extends Controller
{
    public function index(){
        return view('welcome');
    }
    
    public function store($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
        }else{
            return new userResource(true, 'User Sudah Terverifikasi', $user);
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    public function verif($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
        }else{
            return new userResource(true, 'User Sudah Terverifikasi', $user);
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    
    
}
