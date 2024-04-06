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
            ->name('mingle')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mingle_table')
            ->hasCommand(MingleCommand::class);
    }
}
