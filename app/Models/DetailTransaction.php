<?php

namespace App\Models;

use Check;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = ['id_transaksi', 'id_menu', 'jumlah', 'sub_total'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaksi');
    }
}
