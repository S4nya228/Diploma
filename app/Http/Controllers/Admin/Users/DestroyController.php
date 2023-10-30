<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $user->likeComment()->delete();
        $user->comments()->delete();
        $user->proposal()->delete();
        $user->proposals()->detach();

        $user->delete();
        return redirect()->route("admin.users.index");
    }
}
