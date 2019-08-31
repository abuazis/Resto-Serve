<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = ['id_transaksi', 'id_menu', 'jumlah', 'sub_total'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaksi');
    }
}
