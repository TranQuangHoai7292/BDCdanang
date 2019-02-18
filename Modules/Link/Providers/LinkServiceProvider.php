<?php

namespace Modules\Link\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Link\Events\Handlers\RegisterLinkSidebar;

class LinkServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterLinkSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('links', array_dot(trans('link::links')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('link', 'permissions');

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
            'Modules\Link\Repositories\LinkRepository',
            function () {
                $repository = new \Modules\Link\Repositories\Eloquent\EloquentLinkRepository(new \Modules\Link\Entities\Link());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Link\Repositories\Cache\CacheLinkDecorator($repository);
            }
        );
// add bindings

    }
}
