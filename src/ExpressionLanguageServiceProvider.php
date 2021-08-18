<?php

namespace Vurpa\ExpressionLanguage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vurpa\ExpressionLanguage\Commands\ExpressionLanguageCommand;

class ExpressionLanguageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-expression-language')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-expression-language_table')
            ->hasCommand(ExpressionLanguageCommand::class);
    }
}
