<?php

namespace Modules\Tournament\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Tournament\Events\Handlers\RegisterTournamentSidebar;

class TournamentServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterTournamentSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('tournaments', array_dot(trans('tournament::tournaments')));
            $event->load('news', array_dot(trans('tournament::news')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('tournament', 'permissions');

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
            'Modules\Tournament\Repositories\TournamentRepository',
            function () {
                $repository = new \Modules\Tournament\Repositories\Eloquent\EloquentTournamentRepository(new \Modules\Tournament\Entities\Tournament());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Tournament\Repositories\Cache\CacheTournamentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Tournament\Repositories\NewsRepository',
            function () {
                $repository = new \Modules\Tournament\Repositories\Eloquent\EloquentNewsRepository(new \Modules\Tournament\Entities\News());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Tournament\Repositories\Cache\CacheNewsDecorator($repository);
            }
        );
// add bindings


    }
}
