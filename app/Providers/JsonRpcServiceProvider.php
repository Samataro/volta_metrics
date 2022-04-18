<?php

namespace App\Providers;

use Sajya\Server\Binding;
use Sajya\Server\ServerServiceProvider;

class JsonRpcServiceProvider extends  ServerServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->commands($this->commands);
        $this->registerViews();

        $this->app->singleton(Binding::class, fn ($container) => new Binding($container));
    }
}