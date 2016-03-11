<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Response;

class ReserPasswordController extends Controller
{
    use ResetsPasswords;
    public function index(Request $requests){

        #1 add validation
        $result = $this->postEmail($requests);
        return Response::json($result);
    }
}
