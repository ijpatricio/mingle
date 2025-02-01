<?php

namespace Ijpatricio\Mingle;

use Ijpatricio\Mingle\Commands\MingleInstallerCommand;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ijpatricio\Mingle\Commands\MingleMakeCommand;

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
            ->hasCommands(
                MingleMakeCommand::class,
                MingleInstallerCommand::class,
            );

        $this->app->singleton('mingle', function () {
            return new Mingle;
        });

        Blade::directive('mingles', function () {
            return "<?php echo app('mingle')->mingleScripts(); ?>";
        });

    }
}
