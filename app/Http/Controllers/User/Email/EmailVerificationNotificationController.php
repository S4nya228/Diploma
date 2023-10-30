<?php

namespace App\Http\Controllers\User\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()){
            return redirect()->intended();
        }
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Посилання для підтвердження надіслано повторно!');

    }
}
