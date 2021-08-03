<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'user_id',
        'media',
        'description',
        
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

}
