<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $roles)
    {
        $roles->delete();
        return redirect()->route("admin.roles.index");
    }
}
