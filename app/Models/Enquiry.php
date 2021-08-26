<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'Sender_name',
        'sender_id',
        'recepient_id',
        'sender_email',
        'recepient_email',
        'phone_number',
        'subject',
        'message',
    ];
}
