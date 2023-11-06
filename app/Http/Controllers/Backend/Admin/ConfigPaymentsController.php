<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigSettings;
use Illuminate\Http\Request;

class ConfigPaymentsController extends Controller
{
    //
    public function paymentConfig(){

        return view('backend.Admin_Dashboard.config.payment');
        
    }
    
    public function updatePaymobSettings(Request $request)
    {
        $request->validate([
            'PAYMOB_API_KEY' => 'required',
            'PAYMOB_CARD_INTEGRATION_ID' => 'required',
            'PAYMOB_CARD_IFRAME_ID' => 'required',
            'PAYMOB_CARD_VALU_INTEGRATION_ID' => 'required',
    
            'PAYMOB_CARD_VALU_IFRAME_ID' => 'required',
            'PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID' => 'required',
            'PAYMOB_BANK_INSTALLMENT_IFRAME_ID' => 'required',
            'PAYMOB_MOBILE_WALLET_INTEGRATION_ID' => 'required',
        ]);
    
        // Update the .env file with the new values
        $envFile = base_path('.env');
        $data = [
            'PAYMOB_API_KEY' => $request->input('PAYMOB_API_KEY'),
            'PAYMOB_CARD_INTEGRATION_ID' => $request->input('PAYMOB_CARD_INTEGRATION_ID'),
            'PAYMOB_CARD_IFRAME_ID' => $request->input('PAYMOB_CARD_IFRAME_ID'),
            'PAYMOB_CARD_VALU_INTEGRATION_ID' => $request->input('PAYMOB_CARD_VALU_INTEGRATION_ID'),
            'PAYMOB_CARD_VALU_IFRAME_ID' => $request->input('PAYMOB_CARD_VALU_IFRAME_ID'),
            'PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID' => $request->input('PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID'),
            'PAYMOB_BANK_INSTALLMENT_IFRAME_ID' => $request->input('PAYMOB_BANK_INSTALLMENT_IFRAME_ID'),
            'PAYMOB_MOBILE_WALLET_INTEGRATION_ID' => $request->input('PAYMOB_MOBILE_WALLET_INTEGRATION_ID'),
        ];
    
        // Update database settings (assuming you have a ConfigSettings model)
        foreach ($data as $key => $value) {
            ConfigSettings::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    
        // Update .env file
        foreach ($data as $key => $value) {
            file_put_contents($envFile, preg_replace(
                "/$key=.*/",
                "$key=$value",
                file_get_contents($envFile)
            ));
        }
    
        return back()->with('success', 'Pusher settings updated successfully.');
    }
    
}