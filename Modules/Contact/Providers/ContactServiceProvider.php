<?php

namespace Modules\Contact\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Contact\Events\Handlers\RegisterContactSidebar;

class ContactServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterContactSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('contacts', array_dot(trans('contact::contacts')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('contact', 'permissions');

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
            'Modules\Contact\Repositories\ContactRepository',
            function () {
                $repository = new \Modules\Contact\Repositories\Eloquent\EloquentContactRepository(new \Modules\Contact\Entities\Contact());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Contact\Repositories\Cache\CacheContactDecorator($repository);
            }
        );
// add bindings

    }
}
