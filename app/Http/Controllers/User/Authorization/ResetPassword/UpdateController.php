<?php

namespace App\Http\Controllers\User\Authorization\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorization\ResetPassword\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $token)
    {
        $data = $request->validated();
        $updatePassword = DB::table("password_reset_tokens")->where([
            "email" => $data['email'],
            "token" => $token,
        ])->first();

        if (!$updatePassword) {
            return redirect()->back()->with("error", "Не коректна адреса електронної пошти");
        }
        $hash = Hash::make($data['password']);
        User::where("email", $data['email'])
            ->update(["password" => $hash]);

        DB::table("password_reset_tokens")->where(["email" => $data['email']])->delete();

        return redirect()->route("login")->with("message", "Пароль успішно змінено");
    }
}
