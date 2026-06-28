<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

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
            PanelsRenderHook::STYLES_AFTER,
            fn (): string => '<style>
                .fi-sidebar { background-color: #242E1C !important; border-right: 1px solid rgba(197, 160, 89, 0.15) !important; }
                .fi-sidebar-header { background-color: #192013 !important; border-bottom: 1px solid rgba(197, 160, 89, 0.15) !important; }
                .fi-sidebar-group-label { color: rgba(250, 248, 245, 0.5) !important; }
                .fi-sidebar-item-button { color: #FAF8F5 !important; }
                .fi-sidebar-item-button span { color: #FAF8F5 !important; transition: color 0.3s ease; }
                .fi-sidebar-item-button svg, .fi-sidebar-item-icon { color: #C5A059 !important; transition: color 0.3s ease; }
                .fi-sidebar-item-button:hover { background-color: rgba(197, 160, 89, 0.08) !important; }
                .fi-sidebar-item-button:hover span { color: #C5A059 !important; }
                .fi-sidebar-item.fi-active .fi-sidebar-item-button,
                .fi-sidebar-item-active .fi-sidebar-item-button,
                .fi-sidebar-item-button.fi-active,
                .fi-sidebar-item-button.fi-sidebar-item-active,
                .fi-sidebar-item-button[aria-current="page"] {
                    background-color: #C5A059 !important;
                }
                .fi-sidebar-item.fi-active .fi-sidebar-item-button span,
                .fi-sidebar-item-active .fi-sidebar-item-button span,
                .fi-sidebar-item-button.fi-active span,
                .fi-sidebar-item-button.fi-sidebar-item-active span,
                .fi-sidebar-item-button[aria-current="page"] span {
                    color: #242E1C !important;
                    font-weight: 700 !important;
                }
                .fi-sidebar-item.fi-active .fi-sidebar-item-button svg,
                .fi-sidebar-item-active .fi-sidebar-item-button svg,
                .fi-sidebar-item-button.fi-active svg,
                .fi-sidebar-item-button.fi-sidebar-item-active svg,
                .fi-sidebar-item-button[aria-current="page"] svg,
                .fi-sidebar-item.fi-active .fi-sidebar-item-button .fi-sidebar-item-icon,
                .fi-sidebar-item-active .fi-sidebar-item-button .fi-sidebar-item-icon,
                .fi-sidebar-item-button.fi-active .fi-sidebar-item-icon,
                .fi-sidebar-item-button.fi-sidebar-item-active .fi-sidebar-item-icon,
                .fi-sidebar-item-button[aria-current="page"] .fi-sidebar-item-icon {
                    color: #242E1C !important;
                }
                .fi-topbar, .fi-topbar nav { background-color: #FAF8F5 !important; border-bottom: 1px solid rgba(197, 160, 89, 0.15) !important; }
                .fi-simple-layout { background-color: #FAF8F5 !important; background-image: radial-gradient(circle at center, rgba(197, 160, 89, 0.05) 0%, transparent 70%) !important; }
                .fi-simple-layout .fi-simple-card { border: 1px solid rgba(197, 160, 89, 0.2) !important; box-shadow: 0 20px 40px rgba(36, 46, 28, 0.08) !important; }
                .fi-simple-layout-header img { margin-left: auto !important; margin-right: auto !important; }
            </style>',
        );
    }
}
