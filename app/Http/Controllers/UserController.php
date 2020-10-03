<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, Session;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;



class UserController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->middleware('userauth', ['except' => ['logout']]);
    }

    public function signup(){
        self::$to_view['page_title'] .= 'SignUp';
        return view('signup', self::$to_view);
    }

    public function postSignup(SignupRequest $request){
        User::saveNew($request);
        return redirect('/');
    }

    public function logout(){
        Session::forget(['user_id','user_name','is_admin',]);
        return redirect('user/login');
    }

    public function login(){
        self::$to_view['page_title'] .= 'Log-In';
        return view('login', self::$to_view);
    }

    public function postLogin(LoginRequest $request){
        if( User::verify($request['email'], $request['password']) ){
            $to = !empty($request['backTo']) ? $request['backTo'] : '';
            return redirect($to);

        } else {

            self::$to_view['page_title'] .= 'Log-In';
            self::$to_view['verify_error'] = 'Wrong email and password';
            return view('login', self::$to_view);   
        }
    }
}
