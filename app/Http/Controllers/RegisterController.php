<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Validator;

class RegisterController extends Controller
{
    public function index(Request $request){

        $data = $request->all();

        #validation
        $valid = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        if( $valid->fails() ){
            return Response::json('Error: User data not valid',440);
        };
        #create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if( !$user ){
            return Response::json('Error: User not created', 500);
        }

        return Response::json('Success',200);
    }
}
