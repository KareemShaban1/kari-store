<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait SendVerifications
{
    public function sendOTP($phone_number)
    {
        // Step 1: Generate the OTP (you can use any method to generate the OTP)
        $otp = mt_rand(100000, 999999);

        // Step 2: Store the OTP in the session (for temporary storage)
        Session::put('phone_otp', $otp);

        // dd($phone_number ,$otp);

        $url = 'https://api.ultramsg.com/instance57432/messages/chat';
        $params = [
            'token' => 'attxuntrmg0kw75g',
            'to' => $phone_number,
            'body' => 'Your OTP is: ' . $otp . ' for account verification on YourApp.', // Modify the message as needed
        ];

        $response = Http::post($url, $params);

        // Check if the request was successful
        if ($response->successful()) {
            // OTP sent successfully

            return true;
        } else {
            // Failed to send OTP

            return false;
        }
    }
}
