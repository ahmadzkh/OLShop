<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_order',
        'name',
        'no_telp',
        'address',
        'email',
        'payment',
        'note',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id_order');
    }
}