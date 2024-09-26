<?php

namespace App\Http\Controllers\Backend\Admin\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Nafezly\Payments\Classes\PaymobPayment;

class PaymobController extends Controller
{
    //
    public function pay()
    {
        $payment = new PaymobPayment();

        //pay function
        $response =  $payment->setUserId(1)
                ->setUserFirstName('kareem')
                ->setUserLastName('shaban')
                ->setUserEmail('kareemshaban@gmail.com')
                ->setUserPhone('01090537394')
                ->setCurrency('EGP')
                ->setAmount('200')
                ->pay();

        if (isset($response['redirect_url'])) {
            return Redirect::to($response['redirect_url']);
        }

        // If there is no redirect URL, return the response as JSON
        return response()->json($response);



        //pay function response
        // [
        // 	'payment_id'=>"", // reference code that should stored in your orders table
        // 	'redirect_url'=>"", // redirect url available for some payment gateways
        // 	'html'=>"" // rendered html available for some payment gateways
        // ]

    }

    public function verify(Request $request){
        $payment = new PaymobPayment();
        $response = $payment->verify($request);
        
        
        dd($response);
        //output
        //[
        //    'success'=>true,//or false
        //    'payment_id'=>"PID",
        //    'message'=>"Done Successfully",//message for client
        //    'process_data'=>""//payment response
        //]
    }
}