<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; 
use App\Mail\VerifMail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
class VerifController extends Controller
{
    public function index($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
            $user->verif = 1;
        }else{
            return Redirect::to('http://google.com');
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    
    public function store($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
            $user->verif = 1;
        }else{
            return Redirect::to('http://google.com');
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    public function verif($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
            $user->verif = 1;
        }else{
            return redirect('www.google.com');
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    public function show($id){
        $user = User::find($id);
        if(!$user->email_verified_at){
            $date = Carbon::parse()->format('Y-m-d H:i:s');
            $user->email_verified_at = $date;
            $user->verif = 1;
        }else{
           return Redirect::to('http://google.com');
        }
        $user->save();
        return new userResource(true, 'Verifikasi Sukses', $user);
    }
    
    
    
}
