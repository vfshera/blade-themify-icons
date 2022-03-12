<?php

declare(strict_types=1);

namespace BladeUI\ThemifyIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeThemifyIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-themify-icons', []);

            $factory->add('themify-icons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-themify-icons.php', 'blade-themify-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-themify-icons'),
            ], 'blade-themify-icons');

            $this->publishes([
                __DIR__.'/../config/blade-themify-icons.php' => $this->app->configPath('blade-themify-icons.php'),
            ], 'blade-themify-icons-config');
        }
    }
}