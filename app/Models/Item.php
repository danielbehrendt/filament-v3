<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'name',
        'extra_attributes',
    ];

    protected $casts = [
        'extra_attributes' => 'json',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
