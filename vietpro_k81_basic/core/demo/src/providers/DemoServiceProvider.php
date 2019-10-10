<?php 
namespace Botble\Demo;
use Illuminate\Support\ServiceProvider;
class DemoServiceProvider extends ServiceProvider
{
    public function boot()
    {
          $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
          $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'botble-demo');
    }
}