<?php

namespace App\Http\Controllers\User\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Registration\StoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request -> validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));

        if ($user) {
            auth("web")->login($user);
        }

        return redirect(route("main.index"));
    }

}
