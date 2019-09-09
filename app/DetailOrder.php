<?php

namespace App;

use Check;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = ['id_menu', 'id_order', 'jumlah', 'harga', 'status_detail_order'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
