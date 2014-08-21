<?php namespace Likewinter\SypexGeoLaravel4;

use Illuminate\Support\ServiceProvider;

class SypexGeoLaravel4ServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('likewinter/sypexgeo');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['sypexgeo'] = $this->app->share(function ($app) {
            return new SypexGeo($app['config']->get('sypexgeo::db_path'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('sypexgeo');
    }

}
