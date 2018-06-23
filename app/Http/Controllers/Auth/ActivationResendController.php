<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserRequestsActivationEmail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationResendController extends Controller
{
    public function showResendForm()
    {
        return view('auth.activate.resend');
    }

    public function resend(Request $request)
    {
        $this->validateResendRequest($request);

        $user = User::byEmail($request->email)->first();

        event(new UserRequestsActivationEmail($user));

        return redirect()->route('login')
            ->withSuccess('Activation email resent successfully');
    }


    protected function validateResendRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => "couldn't find this account"
        ]);

    }
}
