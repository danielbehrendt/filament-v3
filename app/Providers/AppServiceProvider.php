<?php

namespace App\Providers;

use App\Filament\TiptapBlocks\DetailsBlock;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    DetailsBlock::class,
                ]);
        });

        /**
         * Cookie consent
         */
        Filament::registerRenderHook(
            'panels::head.end',
            fn(): string => Blade::render('@cookieconsentscripts'),
        );

        Filament::registerRenderHook(
            'panels::body.end',
            fn(): string => Blade::render('@cookieconsentview'),
        );

        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn(): string => Blade::render('@cookieconsentbutton(action: \'reset\', label: \'Cookies\', attributes: [\'id\' => \'reset-button\'])'),
        );
    }
}
