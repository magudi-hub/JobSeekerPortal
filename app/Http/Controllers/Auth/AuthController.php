<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        $location = Location::get()->pluck('city', 'id');
        return view('auth.register', compact('location'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'phone' => 'required|digits:10|regex:/^[6-9]+([0-9\s\-\+\(\)]*)$/',
            'experience' => 'required|max:2',
            'notice_period' => 'required|max:3',
            'skills' => 'required',
            'job_location' => 'required',
            'resume' => 'required|file|mimes:doc,docx,pdf|max:2048',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:1024',           
            'password' => 'required|min:8|confirmed',
        ]);
        
        $userModel = new User;
        $userModel->fill($request->all()); 
        $userModel->password = Hash::make($request->password);
        $resumeName = time().'_'.$request->resume->getClientOriginalName();
        $request->file('resume')->storeAs('uploads', $resumeName, 'public');
        $userModel->resume = $resumeName;
        $photoName = time().'_'.$request->photo->getClientOriginalName();
        $request->file('photo')->storeAs('uploads', $photoName, 'public');
        $userModel->photo = $photoName;
        $userModel->save();

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 

    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }
}
