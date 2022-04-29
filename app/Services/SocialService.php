<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{

    public function authUser(SocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();

        if($user) {
            $name = $socialUser->getName();
            if($name) {
                $user->name = $name;
            }
            $avatar = $socialUser->getAvatar();
            if($avatar) {
                $user->avatar = $avatar;
            }
            if($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account.index');
            }

            throw new Exception("Wasn't auth user");
        } else {
            //todo: register here or redirect
            return route('register');
        }
    }

}