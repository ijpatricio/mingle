<?php

namespace Ijpatricio\Mingle;

use Ijpatricio\Mingle\Commands\MingleInstallerCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
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
    }

    public function packageBooted()
    {
        if ($this->app->resolved('blade.compiler')) {
            $this->registerDirective($this->app['blade.compiler']);
        } else {
            $this->app->afterResolving('blade.compiler', $this->registerDirective(...));
        }
    }

    protected function registerDirective(BladeCompiler $blade): void
    {
        dd('fooo');

        $blade->directive('mingles', function () {
            return "<?php echo app('mingle')->mingleScripts(); ?>";
        });
    }
}
