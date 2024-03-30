<?php

namespace Ijpatricio\Mingle;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ijpatricio\Mingle\Commands\MingleCommand;

class MingleServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('minglejs')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_minglejs_table')
            ->hasCommand(MingleCommand::class);
    }
}
