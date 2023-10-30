<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Help $help)
    {
        return view('admin.helps.show', ["help"=>$help]);
    }
}
