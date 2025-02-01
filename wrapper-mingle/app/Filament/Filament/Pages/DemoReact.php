<?php

namespace App\Filament\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Foundation\Vite;
use Illuminate\Support\Facades\Blade;

class DemoReact extends Page
{
    protected static ?string $navigationIcon = 'icon-react';

    protected static string $view = 'filament.filament.pages.demo-react';

    public function mount()
    {
        if (app()->environment('local')) {
            FilamentView::registerRenderHook(
                name: PanelsRenderHook::HEAD_START,
                hook: fn() => app(Vite::class)->reactRefresh(),
            );
        }
        FilamentView::registerRenderHook(
            name: PanelsRenderHook::HEAD_START,
            hook: fn() => Blade::render('@mingles'),
        );
    }
}
