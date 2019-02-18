<?php

namespace Modules\Center\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Center\Events\Handlers\RegisterCenterSidebar;

class CenterServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterCenterSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('centers', array_dot(trans('center::centers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('center', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Center\Repositories\CenterRepository',
            function () {
                $repository = new \Modules\Center\Repositories\Eloquent\EloquentCenterRepository(new \Modules\Center\Entities\Center());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Center\Repositories\Cache\CacheCenterDecorator($repository);
            }
        );
// add bindings

    }
}
