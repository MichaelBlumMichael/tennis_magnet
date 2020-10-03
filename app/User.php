<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB, Session, Hash;

class User extends Model
{
    static public function  saveNew($request){
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        DB::table('user_roles')->insert(['user_id' => $user->id, 'role_id' => 6]);
        Session::put([
            'user_id' => $user->id,
            'user_name'=> $user->name,
            'is_admin' => false,
            ]);
    }

    static public function verify($email, $password){
        $verify = false;

        $user = DB::table('users as u')
        ->join('user_roles as ur', 'u.id', '=', 'ur.user_id')
        ->select('u.id','u.name', 'u.email', 'u.password', 'ur.role_id')
        ->where('u.email', '=', $email)
        ->first();

        if($user){
            
            if( Hash::check($password, $user->password )){

                $verify = true;
                Session::put([
                    'user_id' => $user->id,
                    'user_name'=> $user->name,
                    'is_admin' => $user->role_id == 7 ? true : false, 
                    ]);
                    
                Session::flash('sm', 'Welcome Back ' . $user->name . '!');
            }
        };

        return $verify;
    }
}
