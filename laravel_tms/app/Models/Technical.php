<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    use HasFactory;

    protected $fillable = [
        'findings',
        'actions',
        'replacement',
    ];
}
