<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;
use Illuminate\Support\Facades\File;

class ChangeViteConfig
{
    private string $filePath;

    private ReplaceContents $replace;

    public function __construct()
    {
        $this->filePath = base_path('vite.config.js');

        $this->replace = app(ReplaceContents::class, [
            'file' => $this->filePath
        ]);
    }

    public function __invoke(): bool
    {
        if (! File::exists($this->filePath)) {
            return false;
        }

        // Add Import Statements
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
import laravel from 'laravel-vite-plugin';
EOT,
            'replace' => <<<EOT
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'
EOT,
        ]));


        // Add alias for simpler resolution
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
    plugins: [
EOT,
            'replace' => <<<EOT
    resolve: {
        alias: {
            "@mingle": path.resolve(__dirname, "/vendor/ijpatricio/mingle/resources/js"),
        },
    },
    plugins: [
EOT,
        ]));


        // Add Vue support
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
        laravel({
EOT,
            'replace' => <<<EOT
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
EOT,
        ]));

        return ($this->replace)();
    }
}
