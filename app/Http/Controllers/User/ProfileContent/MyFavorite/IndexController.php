<?php

namespace App\Http\Controllers\User\ProfileContent\MyFavorite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {


        return view('user.favorite');
    }
}

