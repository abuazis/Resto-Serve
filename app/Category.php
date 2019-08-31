<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama_kategori'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }
}
