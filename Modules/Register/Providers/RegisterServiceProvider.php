<?php

namespace Modules\Register\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Register\Events\Handlers\RegisterRegisterSidebar;

class RegisterServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterRegisterSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('registers', array_dot(trans('register::registers')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('register', 'permissions');

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
            'Modules\Register\Repositories\RegisterRepository',
            function () {
                $repository = new \Modules\Register\Repositories\Eloquent\EloquentRegisterRepository(new \Modules\Register\Entities\Register());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Register\Repositories\Cache\CacheRegisterDecorator($repository);
            }
        );
// add bindings

    }
}
