<?php

namespace App\Http\Controllers\User\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorization\LoginRequest;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request){
        $data = $request->validated();

        if (auth("web")->attempt($data)) {
            return redirect(route("main.index"));
        }
        return redirect()->route("login")->withErrors(["email" => "Користувач не знайдений, або дані введені неправильно"]
        );

    }
}
