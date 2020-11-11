<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        /*$validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);*/
        request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'ifAdmin' => 1])) {
            // Authentication passed...
            return redirect()->intended('admin');
        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'ifAdmin' => 0])){
            return redirect()->intended('/');
        }/*else{
            return back()->withErrors($validatedData->errors())->withInput($request->only('email', 'remember'));
            return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');

        }*/
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials')->withInput($request->only('email', 'remember'));

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
