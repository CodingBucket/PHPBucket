<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')){

            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('login');
        } else {
            return view('admin.user.login');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
