<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Locales;

class ProfileController extends Controller
{
    //
    public function edit(){
        
        $user = Auth::user();
        return view('backend.pages.profile.edit',[
            'user'=>$user,
            'countries'=> Countries::getNames('ar'),
            'locales'=>Locales::getNames('ar')
        ]);
    }

    public function update(Request $request){


        $request->validate([
            'first_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'birthday'=>['nullable','date','before:today'],
            'gender'=>['in:male,female'],
           
        ]);

        $user = $request->user();
        $user->profile->fill($request->all())->save();
        return redirect()->route('backend.profile.edit');

        // $profile = $user->profile;
        // if($profile->first_name){
        //     $user->profile->update($request->all());
        // }else{
        //     // $request->merge(['user_id'=>$user->id]);
        //     // Profile::create($request->all());
        //     $user->profile()->create($request->all());
        // }


    }
}
