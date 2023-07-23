<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShippingAddress;
use App\Models\OrderedProduct;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "status",
        "shipping_cost"
    ];

    public function products()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
