<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Configuration extends Model
{
    protected $fillable = [
        'payload',
    ];

    protected $casts = [
        'payload' => 'json',
    ];

    public function configurable(): MorphTo
    {
        return $this->morphTo();
    }
}
