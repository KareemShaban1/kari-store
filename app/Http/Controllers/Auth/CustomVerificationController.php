<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class CustomVerificationController extends Controller
{
    //
    public function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        $phone_number = str_replace('+2', '', $data['phone_number']);
        
        /* Get credentials from .env */
        $token = getenv("TWILIO_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create(['code' => $data['verification_code'], 
            'to' => $data['phone_number']]);

        if ($verification->valid) {

            $user = tap(User::where('phone_number', $phone_number))->
            update(
                ['isVerified' => true,
                'email_verified_at'=>now()]
            );

            /* Authenticate user */

            Auth::login($user->first());
            
            return redirect()->route('home')->with(['message' => 'Phone number verified']);
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    }
}
