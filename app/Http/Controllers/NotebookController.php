<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotebookController extends Controller
{
    function login()
    {
        return view('/notebook/notebook_page');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login_page');
    }
}

?>