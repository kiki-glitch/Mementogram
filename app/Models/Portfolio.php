<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory;
    Use SoftDeletes;

    protected $table = 'portfolios';

    protected $fillable = [
        'user_id',
        'media',
        'description',
        
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $dates = [

        'deleted_at'
    ];

}
