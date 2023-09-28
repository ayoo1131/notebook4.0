<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function signup_new_user(Request $request)
    {
        //Check user input to make sure they meet the requirements outlined below
        $validator =  Validator::make($request->all(), [
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'same:password'],
            'password_repeat' => ['required']
        ]);

        $validator->after(function ($validator) {
            //Custom username validation rule
            $num_returned_rows = sizeof(DB::select("SELECT * FROM users WHERE username =?", [request('username')]));
            if ($num_returned_rows >= 1)//Username already exists in the database
            {
                $validator->errors()->add('username', 'Something is wrong with this field!');
            }

            //Custom password validation rules
            if( ! preg_match("/[a-zA-Z]/i", request('password')))
            {
                echo "error";
                $validator->errors()->add('password', 'Password must contain at least one letter');
            }

            if( ! preg_match("/\d/", request('password')))
            {
                $validator->errors()->add('password', 'Password must contain at least one number');
            }
        });

        $validator -> validate();

        if ($validator -> fails())
        {
            return redirect('/signup_page');
        }

        else
        {
            //Add a new User to the database
            User::create([
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'username' => request('username')
            ]);
            return redirect('/login_page')->with('signup_message_success',"User Successfully Created");
        }
    }
}

?>