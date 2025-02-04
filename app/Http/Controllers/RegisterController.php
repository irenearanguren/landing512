<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function clientRegister(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'client';
        $user->save();

        if(User::where('email',$request->email)->exists()){
            return redirect()->back()->with('message','Email ya esta resgistrado');
        }
        return redirect()->route('login')->with('message','Registro exitoso');
    }

    public function register(){
        return view('register');
    }

}