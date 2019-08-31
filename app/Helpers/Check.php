<?php

namespace App\Helpers;

use App\Level;
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
        $level = Auth::user()->id_level();
        if($level == '1') {
            return 'mysql';
        } elseif($level == '2') {
            return 'mysql_waiter';
        } elseif($level == '3') {
            return 'mysql_kasir';
        } elseif($level == '4') {
            return 'mysql_owner';
        } elseif($level == '5') {
            return 'mysql_pelanggan';
        }
    }
}
