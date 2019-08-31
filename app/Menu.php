<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['id_kategori', 'nama_menu', 'harga', 'status_menu', 'deskripsi', 'gambar'];

    public function detail_order()
    {
        return $this->hasMany(DetailOrder::class, 'id_menu');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'id_kategori');
    }
}
