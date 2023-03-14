<?php

namespace Concept7\SupervisordMonitor;

use Concept7\SupervisordMonitor\Commands\SupervisordMonitorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SupervisordMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('supervisord-monitor')
            ->hasConfigFile()
            ->hasCommand(SupervisordMonitorCommand::class);
    }
}
