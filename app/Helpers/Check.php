<?php

namespace App\Helpers;

use App\Models\Level;
use App\User;
use Illuminate\Support\Facades\Auth;

class Check {

    public static function level(string $email)
    {
        $level = Level::where('email_level', $email)->first();
        if($level == TRUE) {
            return $level->id;
        } else {
            return '5';
        }
    }

    public static function connection()
    {
        $level = User::find(Auth::id());
        if($level->id_level == '1') {
            return 'mysql';
        } elseif($level->id_level == '2') {
            return 'mysql_waiter';
        } elseif($level->id_level == '3') {
            return 'mysql_kasir';
        } elseif($level->id_level == '4') {
            return 'mysql_owner';
        } elseif($level->id_level == '5') {
            return 'mysql_pelanggan';
        }
    }
}
