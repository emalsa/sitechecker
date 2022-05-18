<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_id',
        'created_at',
        'updated_at'
    ];
}
