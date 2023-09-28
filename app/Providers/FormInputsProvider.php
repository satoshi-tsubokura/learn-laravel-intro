<?php

namespace App\Providers;

use App\View\Components\Forms\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FormInputsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('input', Input::class);
    }
}
