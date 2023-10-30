<?php

namespace App\Http\Controllers\Admin\Help;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\Role;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */

        public function __invoke(Help $help)
    {
        return view("admin.helps.edit", ["help" => $help]);
    }
}
