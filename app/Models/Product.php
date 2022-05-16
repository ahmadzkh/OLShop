<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_product',
        'name',
        'slug',
        'specification',
        'price',
        'description',
        'image',
    ];

    public function getImage()
    {
        if ($this->image === null) {
            return asset('/assets/img/image-default.png');
        }
        return asset('/assets/img/product/' . $this->image);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'product_id', 'id_product');
    }
}
