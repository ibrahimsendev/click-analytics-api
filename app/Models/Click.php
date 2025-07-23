<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'url',
        'user_agent',
        'ip_address',
        'clicked_at',
    ];

    public $timestamps = true;
}
