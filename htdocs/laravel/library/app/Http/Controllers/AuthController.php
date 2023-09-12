<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request) {

        $request->validate([
            'name'=>'string|required',
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $user = new User([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $user->save();

        return [
            'usuário salvo:'=>$user
        ];

    }

    public function login() {
        
    }

    public function logout() {
        
    }
}
