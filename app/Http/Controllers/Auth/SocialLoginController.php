<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $providerUser = Socialite::driver($provider)->user();

            $user = User::where(column: [
                'provider' => $provider,
                'provider_id' => $providerUser->id
            ])->first();


            if (!$user) {

                // Check if a user exists with the same email but without a provider (manual registration)
                $userExist = User::where('email', $providerUser->email)->whereNull('provider')->first();
                if ($userExist) {
                    return redirect()->route('login')->withErrors([
                        'email' => 'هذا البريد الالكتورني مستخدم بالفعل سجل باستخدام كلمة السر'
                    ]);
                }

                // Create a new user if no conflict with email
                $user = User::create([
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    'password' => Str::random(8),
                    'provider' => $provider,
                    'provider_id' => $providerUser->id,
                    'provider_token' => $providerUser->token
                ]);
            }

            Auth::login($user);

            return redirect()->route('front.welcome');
        } catch (\Exception $exception) {
            return redirect()->route('login')->with('errorLogin', 'حاول باستخدام بريد الكتروني اخر');
        }
    }
}
