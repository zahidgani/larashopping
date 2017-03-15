<?php
namespace laravelcms\shopping;

use Illuminate\Support\ServiceProvider;

class ShoppingServiceProvider extends ServiceProvider
{
    
 /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         include __DIR__.'/routes.php';
         //For publich and copy this view in your another laravel project command:php artisan vendor:publish
          $this->publishes([
                __DIR__.'/views' => base_path('resources/views/laravelcms/shopping'),
         ]);

        $this->publishes([
           __DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');

         $this->publishes([
           __DIR__ . '/seeds' => $this->app->databasePath() . '/seeds'
        ], 'seeds');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         // register our controller
         $this->app->make('laravelcms\shopping\ProductController');
         $this->loadViewsFrom(__DIR__.'/views', 'add-product');  
         $this->loadViewsFrom(__DIR__.'/views', 'manage-product');       
    }

    
}
