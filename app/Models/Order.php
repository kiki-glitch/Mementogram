<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
         'status',
        'grand_total',
         'is_paid',
        'payment_method',
        'phone_number',
        'is_paid',
         'is_returned',
    ];

    public function items(){

        return $this->belongsToMany(Products::class, 'order_items','order_id','product_id');
    }
}
