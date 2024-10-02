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
        $providerUser = Socialite::driver($provider)->user();

        $user = User::where([
            'provider' => $provider,
            'provider_id' => $providerUser->id
        ])->first();

        if (!$user) {
            User::create([
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
    }
}
