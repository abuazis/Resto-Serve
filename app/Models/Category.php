<?php

namespace App\Models;

use Check;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }
}
