<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = ['id_menu', 'id_order', 'jumlah', 'harga', 'status_detail_order'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
