<?php

namespace Concept7\SupervisordMonitorCli;

use Concept7\SupervisordMonitorCli\Commands\SupervisordMonitorCliCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SupervisordMonitorCliServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('supervisord-monitor-cli')
            ->hasConfigFile()
            ->hasCommand(SupervisordMonitorCliCommand::class);
    }
}
