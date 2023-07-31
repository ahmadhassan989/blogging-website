<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'=>['required','min:3','max:255'],
            'username'=>['required','min:3','max:255',Rule::unique('users','username')],
            'email'=>['required','min:3','max:255','email',Rule::unique('users','email')],
            'password'=>['required','min:3','max:255'],
        ]);

        $user = User::create($attributes);

        /// Registered users login ///
        auth()->login($user);

        // session()->flash('success','Your account has been created');

        
        return redirect('/')->with('success','Your account has been created');
    }
}
