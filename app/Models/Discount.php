<?php

namespace App\Models;

use Check;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['kode', 'diskon', 'status'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }
}
