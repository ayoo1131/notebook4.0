<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Storage;

class SignupController extends Controller
{
    public function signup_new_user(Request $request)
    {
        //Check user input to make sure they meet the requirements outlined below
        $validator =  Validator::make($request->all(), [
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'same:password_repeat'],
            'password_repeat' => ['required']
        ]);

        //Custom Validation Rules
        $validator->after(function ($validator) 
        {
            //Custom username validation rule
            $num_returned_rows_username = sizeof(DB::select("SELECT * FROM users WHERE username =?", [request('username')]));
            
            if ($num_returned_rows_username >= 1)//Username already exists in the database
            {
                $validator->errors()->add('username', 'Username is not avaliable');
            }

            $num_returned_rows_email = sizeof(DB::select("SELECT * FROM users WHERE email =?", [request('email')]));
            if ($num_returned_rows_email >= 1)//Username already exists in the database
            {
                $validator->errors()->add('email', 'Email has already been registered');
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

        if ($validator -> fails())//Return to the signup page if validation fails
        {
            return redirect('/signup_page');
        }

        else//Add a new User to the database
        {
            User::create([
                'email' => strtolower(request('email')),
                'password' => Hash::make(request('password')),
                'username' => strtolower(request('username'))
            ]);

            $username = request('username');
            //Create a new directory for the user's files
            if(!Storage::disk('local')->exists('notebook_users/'.$username)) {
                Storage::disk('local')->makeDirectory('notebook_users/'.$username, 0777, true, true);
                //Storage::makeDirectory($path, $mode, $recursive(throught the whole directory), $force)
            } 

            return redirect('/login_page')->with('signup_message_success',"User Successfully Created");
        }
    }
}

?>