<?php

namespace App\Http\Controllers\User\Authorization\ForgotPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Authorization\ForgotPassword\StoreRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $token = \Illuminate\Support\Str::random(64);
        $data = $request->validated();

        DB::table("password_reset_tokens")->insert([
            "email" => $data['email'],
            "token" => $token,
            "created_at" => Carbon::now(),
        ]);

        Mail::send("user.reset-password.reset-template", ['token' => $token], function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject("Відновлення паролю");
        });

        return redirect()->route('login')->with('message', 'Посилання для відновлення паролю відправлено успішно!');
    }
}
