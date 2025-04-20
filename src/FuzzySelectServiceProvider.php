<?php

namespace Castellanos\FuzzySearch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Castellanos\FuzzySearch\Components\FuzzySelect;

class FuzzySelectServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Cargar vistas del paquete
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fuzzy');

        // Registrar el componente Blade
        Blade::component(FuzzySelect::class, 'fuzzy-select');

        // Publicar el archivo JavaScript
        $this->publishes([
            __DIR__.'/../resources/js/fuzzySearch.js' => resource_path('js/vendor/fuzzySearch.js'),
        ], 'fuzzy-js');
    }

    public function register()
    {
        //
    }
}
