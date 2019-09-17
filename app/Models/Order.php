<?php

namespace App\Models;

use Check;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_user', 'nama_pelanggan', 'no_meja', 'alamat', 'waktu_order', 'keterangan', 'status_order'];

    public function __construct(array $attributes = [])
    {
        $this->bootIfNotBooted();
        $this->fill($attributes);
        $this->setConnection(Check::connection());
    }

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
