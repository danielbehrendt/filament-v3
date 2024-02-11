<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Livewire::setUpdateRoute(function($handle) {
            return Route::post('/livewire/update', $handle)
                ->middleware([
                    'web',
                ]);
        });
    }
}
