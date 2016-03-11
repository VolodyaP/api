<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LogOutController extends Controller
{
    public function index()
    {
        if ( ! Auth::user() ){
            return Response::json('Error: User is not login',500);
        }
        Auth::guard()->logout();

        return Response::json('Success',200);
    }
}
