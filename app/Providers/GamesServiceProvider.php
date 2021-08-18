<?php

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

/**
 * Class GamesServiceProvider
 * @package App\Providers
 */
class GamesServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('view')->composer('layouts.shortcodes.games', 'App\Http\ViewComposers\GamesComposer');
    }
}
