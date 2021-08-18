<?php

namespace Vurpa\ExpressionLanguage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Symfony\Component\Cache\Adapter\Psr16Adapter;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
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
            ->name('expression-language')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        $this->app->singleton(ExpressionLanguage::class, function ($app) {
            $cache_store_name = config('expression-language.cache_store');
            if ($cache_store_name === 'default') {
                $cache_store_name = null;
            }

            $cache_store = $app['cache']->store($cache_store_name);

            return new ExpressionLanguage(new Psr16Adapter($cache_store));
        });
    }
}
