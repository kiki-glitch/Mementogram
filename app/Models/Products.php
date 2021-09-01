<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    Use SoftDeletes;


    protected $fillable = [
        'category',
        'product_img',
        'name',
        'description',
        'price',

    ];

     protected $dates = [

        'deleted_at'
    ];
}
