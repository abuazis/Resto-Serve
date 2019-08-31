<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id_user', 'nama_pelanggan', 'no_meja', 'alamat', 'waktu_order', 'keterangan', 'status_order'];

    public function detail_order()
    {
        return $this->hasMany(DetailOrder::class, 'id_order');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
