<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_id', 'provider_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
