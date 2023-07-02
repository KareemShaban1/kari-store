<?php

namespace App\Actions\Fortify;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email_address' => ['required','string','email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
            'phone_number'=>'nullable|min:11',
            'governorate'=>'nullable',
            'city'=>'nullable',
            'postal_code'=>'nullable',
            'street_address'=>'nullable',
        ])->validate();

        // dd($input);

        return User::create([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email_address' => $input['email_address'],
        'email_verified_at' => now(),
        'password' => Hash::make($input['password']),
        'phone_number' => $input['phone_number'],
        'governorate' => $input['governorate'],
        'city' => $input['city'],
        'postal_code' => $input['postal_code'],
        'street_address' => $input['street_address'],
        'remember_token' => Str::random(10),
            ]);
    }
}
