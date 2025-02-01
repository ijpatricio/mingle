<?php

namespace App\Filament\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Foundation\Vite;
use Illuminate\Support\Facades\Blade;

class DemoVue extends Page
{
    protected static ?string $navigationIcon = 'icon-vue';

    protected static string $view = 'filament.filament.pages.demo-vue';

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
            hook: fn() => Blade::render('@mingleScripts'),
        );
    }
}
