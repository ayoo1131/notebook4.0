<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function toSignupPage(){
        return view('login_signup/signup_page');
    }

    public function toLoginPage(){
        return view('login_signup/login_page');
    }

    public function toNotebookPage(){
        return view('notebook/notebook_page');
    }
}
