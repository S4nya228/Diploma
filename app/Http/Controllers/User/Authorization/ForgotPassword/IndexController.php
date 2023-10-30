<?php

namespace App\Http\Controllers\User\Authorization\ForgotPassword;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view("user.forgot-password.forgot-password");
    }
}
