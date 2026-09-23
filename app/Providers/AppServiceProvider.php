<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn (): string => Blade::render('
                <style>
                    .ppm-back-link { color: rgb(37, 99, 235); display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; text-decoration: none; font-size: 0.875rem; font-weight: 500; transition: color 0.2s; }
                    .ppm-back-link:hover { color: rgb(29, 78, 216); text-decoration: underline; }
                    .ppm-back-svg { width: 1rem; height: 1rem; }
                </style>
                <div style="margin-top: 1.5rem; text-align: center;">
                    <a href="{{ url(\'/\') }}" class="ppm-back-link">
                        <svg class="ppm-back-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        <span>Kembali ke Halaman Beranda</span>
                    </a>
                </div>
            ')
        );
    }
}