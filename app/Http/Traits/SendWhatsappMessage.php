<?php

namespace App\Http\Traits;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait SendWhatsAppMessage
{
    public function sendMessage($phone_number,$messageBody)
    {

        $phone_number = '2'. $phone_number;

        $url = 'https://api.ultramsg.com/instance' . env('ULTRA_MESSAGE_INSTANCE') . '/messages/chat';
        $params = [
            'token' => env('ULTRA_MESSAGE_TOKEN'),
            'to' => $phone_number,
            'body' => $messageBody, // Modify the message as needed
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