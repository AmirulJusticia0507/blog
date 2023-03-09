<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('/');
    }

    return redirect()
        ->back()
        ->withErrors(['email' => 'These credentials do not match our records.'])
        ->withInput();
}

}
