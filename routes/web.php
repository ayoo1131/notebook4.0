<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SignupController;

//Main Webpage
Route::get('/', function () {
    return view('login_signup/login_page');
});

//Get Requests to interactive pages(url)
Route::get('login_page', function(){
    return view('login_signup/login_page');
});

Route::get('signup_page', function(){
    return view('login_signup/signup_page');
});

Route::get('notebook_page', function(){
    return view('notebook/notebook_page');
});

//Routes to handle page navigation w/ button
Route::post('/signup_page', [PageController::class, 'toSignupPage']); //From Login Page to Signup Page
Route::post('/login_page', [PageController::class, 'toLoginPage']); // From Signup Page to Login Page(Back button)
Route::post('/notebook_page', [PageController::class, 'toNotebookPage']);

//Routes to handle signup page processes
Route::post('/signup_new_user', [SignupController::class, 'signup_new_user']);