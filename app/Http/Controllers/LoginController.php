<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);

        $validator -> validate();

        $username = $request->input('username');
        $password = $request->input('password');

        $attempt = Auth::attempt(['username' => $username, 'password' => $password]);

        if ($attempt)
        {
            return redirect('notebook_page');
        }

        else
        {
            return redirect('/login_page')->with('login_message_error',"Invalid Username/Password");
        }
    }
}

?>