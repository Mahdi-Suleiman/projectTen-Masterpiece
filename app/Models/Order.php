<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'country',
        'quantity',
        'mobile_number',
        'total',
        'user_id',
        'product_id',
    ];
}
