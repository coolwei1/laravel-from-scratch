<?php

namespace App\Providers;

use App\Services\Twitter;
use function foo\func;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    // for every Service Provider, laravel loop over and call register method
    // bind things into container
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

//        // can bind something into service container here
//        $this->app->singleton(Twitter::class, function (){
//            return new Twitter('api-key'); // remember put api-key into your env file
//        });

        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\DbUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // this method called after all framework booted up
    public function boot()
    {
        //
    }
}
