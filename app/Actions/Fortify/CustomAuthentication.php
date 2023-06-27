<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use App\Models\Delivery;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthentication
{

          public function authenticateAdmin($request)
          {
                    // determine which field used to authenticate as username , email , phone
                    $user_name = $request->post(config('fortify.username')); // username
                    $password = $request->post('password');

                    // get admin based on user_name , email , phone_number
                    $user = Admin::where('user_name', '=', $user_name)
                              ->orWhere('email', '=', $user_name)
                              ->orWhere('phone_number', '=', $user_name)
                              ->first();

                    // check if there is user (Admin) and his password == password input
                    if ($user && Hash::check($password, $user->password)) {
                              // authenticate with admin guard
                              // Auth::guard('admin')->login($user);
                              return $user;
                              dd($user);
                    }
                    return false;
          }



          public function authenticateUser($request)
          {
                    $email = $request->email;
                    $password = $request->password;
                    // dd($request->all());
                    $user = User::where('email_address', '=', $email)->first();
                    
                    if ($user && Hash::check($password, $user->password)) {
                              return $user;
                    }
                    return false;
          }

          public function authenticateVendor($request)
          {
                    $email = $request->email;
                    $password = $request->password;
                    // dd($request->all());
                    $user = Vendor::where('email', '=', $email)->first();
                    
                    if ($user && Hash::check($password, $user->password)) {
                              return $user;
                    }
                    return false;
          }


          public function authenticateDelivery($request)
          {
                    $email = $request->email;
                    $password = $request->password;
                    // dd($request->all());
                    $user = Delivery::where('email', '=', $email)->first();
                    // dd( Hash::check($password, $delivery->password));
                    if ($user && Hash::check($password, $user->password)) {
                              return $user;
                    }
                    return false;
          }


}
