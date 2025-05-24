<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegistrationPostRequest $request) 
    {
        $new_user = new User();
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = Hash::make($request->password);
        $new_user->save();

        Auth::login($new_user);

        return redirect('/login');
    }
}
