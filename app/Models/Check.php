<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model {

    use HasFactory;

    protected $fillable = [
        'title',
        'resource',
        'user_id',
        'created_at',
        'updated_at',
    ];

}
