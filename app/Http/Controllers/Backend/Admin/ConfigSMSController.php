<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigSettings;
use Illuminate\Http\Request;

class ConfigSMSController extends Controller
{
    //

    public function index(){
        $config = ConfigSettings::all();

        return view('backend.Admin_Dashboard.config.sms',compact('config'));
    }


    public function updateUltraMessageSettings(Request $request)
    {
        
        $request->validate([
            'ULTRA_MESSAGE_INSTANCE' => 'required',
            'ULTRA_MESSAGE_TOKEN' => 'required',
            
        ]);

        // Update the .env file with the new values
        $envFile = base_path('.env');
        $data = [
            'ULTRA_MESSAGE_INSTANCE' => $request->input('ULTRA_MESSAGE_INSTANCE'),
            'ULTRA_MESSAGE_TOKEN' => $request->input('ULTRA_MESSAGE_TOKEN'),
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