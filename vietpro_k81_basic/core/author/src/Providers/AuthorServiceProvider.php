<?php 

namespace Unicorn\Author\Providers;

use Illuminate\Support\ServiceProvider;

class AuthorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'author');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}