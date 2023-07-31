<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    // login page
    public function create()
    {
        return view('session.index');
    }

    public function store()
    {
        // validate
        $attributes = request()->validate([
            // 'email'=>[Rule::exists('users','email')],
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // attemp login
        if (auth()->attempt($attributes)) {

            //session fixation
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome back,' . auth()->user()->name);
        }

        // auth faild

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }
    // log out user
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye! ');
    }
}
