<?php

namespace App\Providers;

use App\Actions\Fortify\CustomAuthentication;
use App\Actions\Fortify\RegisterUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $request = request();
        // check if route start with admin/
        if ($request->is('admin/*')) {
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.password', 'admins');
            Config::set('fortify.prefix', 'admin');
            //// redirect admin after login 
            // Config::set('fortify.home', 'backend/dashboard');
        }

        // redirect user or admin after login 
        $this->app->instance(LoginResponse::class,new class implements LoginResponse {
           public function toResponse($request){
            // $request->user('admin') // admin -> guard_name
                if ($request->user('admin')) {
                    return redirect('/backend/dashboard');
                }
                return redirect('/');
           } 
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //// if callback function is on class we will return it in array 
        //// as a second element and class in first one
        //// if method was static we will send class "AuthenticateUser::class" 
        //// if not we will send object "new AuthenticateUser"
        // Fortify::authenticateUsing([new AuthenticateUser,'authenticate']);


        // Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::createUsersUsing(RegisterUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            // user can send only 5 requests in one minute
            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });


        // custom code
        if (Config::get('fortify.guard') == 'admin') {
            //// this method will be used in "admin" guard only
            Fortify::authenticateUsing([new CustomAuthentication,'authenticateAdmin']);
            //// put prefix for auth backend pages => /login/admin
            Fortify::viewPrefix('backend.auth.');

        } else {

            //// this method will be used in "web" guard only
            Fortify::authenticateUsing([new CustomAuthentication , 'authenticateUser']);
            //// put prefix for auth frontend pages =>  /login
            Fortify::viewPrefix('frontend.auth.');

        }


        // Fortify::loginView(function () {
        //     if (Config::get('fortify.guard') == 'web') {
        //         return view('front.auth.login');
        //     }
        //     return view('auth.login');
        // });
        // Fortify::loginView('auth.login');
        // Fortify::registerView('auth.register');
        // Fortify::forgotPasswordView('auth.forgot-password');
    }
}
