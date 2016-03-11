<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LogInController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.basic');
    }

    public function login()
    {
        $user = Auth::user();
        return Response::json($user,200);
    }
}
