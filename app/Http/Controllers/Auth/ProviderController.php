<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProviderController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {

        try {
            $SocialUser = Socialite::driver($provider)->user();
            // dd($user);

            if (User::where('email', $SocialUser->getEmail())->exists()){
                return redirect('/login')->withErrors(['email' => 'Kamu menggunakan metode lain untuk login']);
            }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
                ])->first();

                if (!$user) {
                    $user = User::create([
                        'name' => $SocialUser->getName(),
                        'email' => $SocialUser->getEmail(),
                        'username' => User::generateUserName($SocialUser->getNickname()),
                        'provider' => $provider,
                        'provide_id' => $SocialUser->getId(),
                        'provide_token' => $SocialUser->token,
                        'email_verified_at' => now(),
                    ]);
                }
                Auth::login($user);
                return redirect('/dashboard');

        } catch (Exception $e) {
            return redirect('/login');
        }
        // $user = User::updateOrCreate([
        //     'provider_id' => $SocialUser->id,
        //     'provider' => $provider,
        // ], [
        //     'name' => $SocialUser->name,
        //     'username' => User::generateUserName($SocialUser->nickname),
        //     'email' => $SocialUser->email,
        //     'provider_token' => $SocialUser->token,
        // ]);
        // Auth::login($user);

        // return redirect('/dashboard');

    }
}
