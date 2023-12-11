<?php

namespace App\Models;

use App\Domain\Dataset\Models\DatasetItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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


    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
