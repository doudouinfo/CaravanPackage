<?php
namespace Caravan\Package\Providers;

use Caravan\Package\Repositories\Package\PackageRepository;
use Caravan\Package\Repositories\Package\EloquentPackage;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function  boot(){
       // $this->loadRoutesFrom(__DIR__.'/routes/web.php');
       // $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/views','package');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public  function  register()
    {
        $this->app->singleton(PackageRepository::class, EloquentPackage::class);
    }

}
