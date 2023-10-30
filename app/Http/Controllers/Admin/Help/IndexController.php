<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Help $help)
    {
        return view("admin.helps.index",["helps"=>Help::all(), "help"=>$help]);
    }
}
