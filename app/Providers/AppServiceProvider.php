<?php

namespace App\Providers;

use App\Http\View\Composers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    { 
        // Asocia el View Composer con la vista 'components.layout'
        View::composer('components.layout', UserComposer::class);
        // Asocia el View Composer con la vista 'components.publicaciones'
        // Esto permite que la vista 'components.publicaciones' tenga acceso a los datos proporcionados
        View::composer('components.publicaciones', UserComposer::class);
        // View::composer('views.home.home', UserComposer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
