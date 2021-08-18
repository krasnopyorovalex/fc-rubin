<?php

namespace App\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

/**
 * Class NewsServiceProvider
 * @package App\Providers
 */
class NewsServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('view')->composer('layouts.sections.news', 'App\Http\ViewComposers\NewsComposer');
    }
}
