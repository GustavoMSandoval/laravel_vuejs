<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request) {

        $incomingFields = $request->validate([
            'avatar' => ['file', 'nullable'],
            'name' => ['required', 'min:3'],
            'email' => ['required','email', 'unique:users'],
            'password' => ['required','min:8','confirmed'],
            
        ]);
        
        if($request->hasFile('avatar')) {
            $incomingFields['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($incomingFields);

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'message' => 'The provided email or password do not match our records.',
        ])->onlyInput('message');

    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
        
    }
}
