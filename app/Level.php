<?php

namespace App;

use Check;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['nama_level', 'email_level'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_level');
    }
}
