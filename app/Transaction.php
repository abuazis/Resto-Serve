<?php

namespace App;

use Check;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['id_user', 'id_order', 'total_bayar', 'uang_dibayar', 'total_kembali'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

    public function detail_transaction()
    {
        return $this->hasMany(DetailTransaction::class, 'id_transaksi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
