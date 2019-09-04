<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = ['id_kategori', 'nama_menu', 'harga', 'status_menu', 'deskripsi', 'gambar'];

    public function detail_order()
    {
        return $this->hasMany(DetailOrder::class, 'id_menu');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}
