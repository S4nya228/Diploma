<?php

namespace App\Http\Controllers\User\Authorization\ResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke($token)
    {
        return view("user.reset-password.reset-password", ['token'=>$token]);
    }
}
