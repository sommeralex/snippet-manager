<?php

namespace Moonshiner\SnippetManager;

use Illuminate\Support\ServiceProvider;
use Blade;
use App;
class SnippetManagerServiceProvider extends ServiceProvider
{

    protected $defer = false;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $configPath = __DIR__ . '/../config/snippet-manager.php';

        $this->mergeConfigFrom($configPath, 'snippet-manager');

        $this->publishes([$configPath => config_path('snippet-manager.php')], 'config');

        $this->app->singleton('snippet.manager', function ($app) {
            return new SnippetManager();
        });

        Blade::directive('namespace', function ($namespace) {
            App::make('SnippetManager')->setNameSpace($namespace);
        });

        Blade::directive('s', function ($snippet, $default = '') {
             return App::make('SnippetManager')->getSnippet($snippet, $default);
        });
    }

    public function provides()
    {
        return [
            'snippet.manager'
        ];
    }
}
