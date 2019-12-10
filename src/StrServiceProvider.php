<?php

namespace Boomdraw\Str;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class StrServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMacro();
    }

    /**
     * Register package macros.
     */
    protected function registerMacro(): void
    {
        $class = __NAMESPACE__.'\Str';
        $methods = get_class_methods($class);
        foreach ($methods as $method) {
            Str::macro($method, [$class, $method]);
        }
    }
}
