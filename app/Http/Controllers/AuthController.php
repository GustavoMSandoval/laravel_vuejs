<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {

        sleep(1);

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required','email', 'unique:users'],
            'password' => ['required','min:8','confirmed'],

        ]);

        $user = User::create($incomingFields);

        Auth::login($user);

        return redirect()->route('home');

    }
}
