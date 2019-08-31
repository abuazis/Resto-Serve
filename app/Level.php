<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['nama_level', 'email_level'];

    public function user()
    {
        return $this->hasMany(User::class, 'id_level');
    }
}
