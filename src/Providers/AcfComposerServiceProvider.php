<?php

namespace Log1x\AcfComposer\Providers;

use Illuminate\Support\ServiceProvider;
use Log1x\AcfComposer\AcfComposer;

class AcfComposerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/acf.php' => $this->app->configPath('acf.php'),
        ], 'config');

        $this->commands([
            \Log1x\AcfComposer\Console\BlockMakeCommand::class,
            \Log1x\AcfComposer\Console\FieldMakeCommand::class,
            \Log1x\AcfComposer\Console\PartialMakeCommand::class,
            \Log1x\AcfComposer\Console\WidgetMakeCommand::class,
            \Log1x\AcfComposer\Console\OptionsMakeCommand::class,
            \Log1x\AcfComposer\Console\StubPublishCommand::class,
        ]);

        config([
            'app.hooks' => [
                ...config('app.hooks', []),
                \Log1x\AcfComposer\AcfComposer::class,
            ]
        ]);
    }
}
