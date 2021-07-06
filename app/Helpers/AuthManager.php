<?php


namespace App\Helpers;


use Modules\Ums\Entities\User;

class AuthManager
{
    public static function isSuperAdmin()
    {
        // get user
        $user = User::find(auth()->user()->id);

        // check if admin user
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        return false;
    }

    public static function isAdmin()
    {
        // get user
        $user = User::find(auth()->user()->id);

        // check if admin user
        if ($user->hasRole('Admin')) {
            return true;
        }

        return false;
    }

    public static function isUser()
    {
        // get user
        $user = User::find(auth()->user()->id);

        // check if admin user
        if ($user->hasRole('User')) {
            return true;
        }

        return false;
    }
}
