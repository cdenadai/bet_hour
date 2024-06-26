<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'hour'
    ];

    protected $casts = [
        'hour' => 'datetime:H:i'
    ];
}
