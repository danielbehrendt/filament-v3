<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Test extends Model
{
    protected $fillable = [
        'name'
    ];

    public function formConfiguration(): MorphOne
    {
        return $this->morphOne(Configuration::class, 'configurable');
    }

}
