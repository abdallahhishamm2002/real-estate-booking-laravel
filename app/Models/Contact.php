<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Allow mass assignment on these fields:
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
