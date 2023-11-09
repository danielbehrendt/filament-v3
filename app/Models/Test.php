<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $casts = [
        'categories' => 'array',
        'content' => 'json'
    ];
}
