<?php

namespace App\Http\Controllers\User\ProfileContent\MyProp;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $proposals = $user->proposal()->paginate(5);


        return view("user.my-prop", ["proposals" => $proposals]);
    }
}
