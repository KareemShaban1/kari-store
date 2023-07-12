<?php

namespace App\Actions\Fortify;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Twilio\Rest\Client;

class RegisterUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    // create new user not admin

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {
        
        $data = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email_address' => ['required','string','email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
            'phone_number'=>'required:min:11',
            'governorate'=>'nullable',
            'city'=>'nullable',
            'postal_code'=>'nullable',
            'street_address'=>'nullable',
        ])->validate();

        $phone_number = '+2' . $data['phone_number'];

        

        /* Get credentials from .env */
        $token = getenv("TWILIO_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        // dd($token,$twilio_sid,$twilio_verify_sid);
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phone_number, "sms");

        Session::put('phone',$phone_number);   

        return 
        // $user = 
        User::create([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email_address' => $input['email_address'],
        'email_verified_at' => null,
        'password' => Hash::make($input['password']),
        'phone_number' => $input['phone_number'],
        'governorate' => $input['governorate'],
        'city' => $input['city'],
        'postal_code' => $input['postal_code'],
        'street_address' => $input['street_address'],
        'remember_token' => Str::random(10),
            ]);
            // return redirect()->route('custom_verification')->with(['phone_number' => $data['phone_number']]);

    }
}
