<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('page')
            ->withSuccess('Sign in');
        }
        return redirect('login')->withSuccess('login are not valid');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function customRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('page')->withSuccess('you have sign in');
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard($name = null){
        if (Auth::check()) {
            // Use the authenticated user's name if available, otherwise use the default 'Guest'
            $name = $name ?? (Auth::user() ? Auth::user()->name : 'Guest');
            return view('page', compact('name'));
        }

        return redirect('login')->withSuccess('your not allowed to access');
    }

    public function signOut(){
        Session:flush();
        Auth::logout();

        return redirect('login');
    }

    

}
