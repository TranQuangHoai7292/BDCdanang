<?php

namespace Modules\Classstudy\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Classstudy\Events\Handlers\RegisterClassstudySidebar;

class ClassstudyServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterClassstudySidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('classstudies', array_dot(trans('classstudy::classstudies')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('classstudy', 'permissions');

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
            'Modules\Classstudy\Repositories\ClassstudyRepository',
            function () {
                $repository = new \Modules\Classstudy\Repositories\Eloquent\EloquentClassstudyRepository(new \Modules\Classstudy\Entities\Classstudy());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Classstudy\Repositories\Cache\CacheClassstudyDecorator($repository);
            }
        );
// add bindings

    }
}
