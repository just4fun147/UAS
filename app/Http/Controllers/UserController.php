<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;
class UserController extends Controller
{

    public function index(Request $request){
        $validatedData = $request->validate([
            'name' => 'max:60|not_regex:/^(admin)$/i',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{4,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'image' => 'image|file|max:2048|mimes:jpg,png,jpeg',
            'type' => 'required'
        ]);
        if( $request->hasFile('image')) {
            $path = $request->file('image')->store('user-images');
            $validatedData['image'] =$path;
        }

        $validatedData['password'] = bcrypt($request->password);
        
        $user = User::create($validatedData);
        event(new Registered($user));
        return new userResource(true, 'Registrasi Sukses', $user);
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'max:60|not_regex:/^(admin)$/i',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{4,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'image' => 'image|file|max:2048|mimes:jpg,png,jpeg',
            'type' => 'required'
        ]);
        if( $request->hasFile('image')) {
            $path = $request->file('image')->store('user-images');
            $validatedData['image'] =$path;
        }

        $validatedData['password'] = bcrypt($request->password);
        
        $user = User::create($validatedData);
        event(new Registered($user));
        return new userResource(true, 'Registrasi Sukses', $user);
    }
    
    public function update(Request $request, $id){

        $user = User::find($id);
        $temp= $user->email;
        $this->validate($request, [ 
            'name' => 'max:60|not_regex:/^(admin)$/i',
            'email' => 'email:rfc,dns'
           ]); 
       
        if($request->name){
            $user->name = $request->name;
        }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->password){
            $this->validate($request, [ 
                'password' => 'min:6|regex:/^.*(?=.{4,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ]);
            $user->password = bcrypt($request->password);
        }

        if( $request->hasFile('image')) {
            $this->validate($request, [ 
                'image' => 'image|file|max:2048|mimes:jpg,png,jpeg',
            ]);
            if($request->oldImage){
                Storage::delete($request->oldImage);
             }
            $path = $request->file('image')->store('user-images');
            $user->image =$path;
        }

        $user->save();
        return new userResource(true, 'Update User Sukses', $user);

    }

    public function destroy($id){
        $user = User::find($id);
        User::destroy($id);
        return new userResource(true, 'Delete User Sukses', $user);
    }
}
