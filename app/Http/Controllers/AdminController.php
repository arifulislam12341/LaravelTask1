<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    public function Register(){
        return view('admin.register');
    }

    public function RegisterSubmit(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user =Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
         
         return redirect()->route('login')->with('error',"Admin Created Successfully");
    }


    public function Login(){
        return view('admin.login');
    }


public function LoginSubmit(Request $request){

    //dd($request->all());
$check=$request->all();
if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']])){


        return redirect()->route('dashboard')->with('error',"Admin Login Successfully");
    
}
    else{
        return back()->with('error','Invalid email or password');
    }

}

    public function Dashboard(){
        
        return view('admin.dashboard');
    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login')->with('error',"Admin Logout Successfully");
    
    }

}
