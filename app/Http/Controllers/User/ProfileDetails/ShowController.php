<?php

namespace App\Http\Controllers\User\ProfileDetails;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        return view("user.personal-details", ["user"=>$user]);
    }
}
