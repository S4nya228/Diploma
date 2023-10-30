<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\UpdateRequest;
use App\Models\Role;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Role $roles)
    {
        $data = $request->validated();
        $roles->update($data);
        return redirect()->route("admin.roles.index");
    }
}
