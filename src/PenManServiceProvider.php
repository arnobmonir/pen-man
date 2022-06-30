<?php

namespace ArnobMonir\PenMan;

use Illuminate\Support\ServiceProvider;

class PenManServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
    public function register()
    {
    }
}
