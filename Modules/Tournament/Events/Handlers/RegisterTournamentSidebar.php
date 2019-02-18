<?php

namespace Modules\Tournament\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterTournamentSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('Website BDC'), function (Group $group) {
            $group->item(trans('tournament::tournaments.title.tournaments'), function (Item $item) {
                $item->icon('fa fa-gamepad');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('tournament::tournaments.title.tournaments'), function (Item $item) {
                    $item->icon('fa fa-gamepad');
                    $item->weight(0);
                    $item->append('admin.tournament.tournament.create');
                    $item->route('admin.tournament.tournament.index');
                    $item->authorize(
                        $this->auth->hasAccess('tournament.tournaments.index')
                    );
                });
                $item->item(trans('tournament::news.title.news'), function (Item $item) {
                    $item->icon('fa fa-gamepad');
                    $item->weight(0);
                    $item->append('admin.tournament.news.create');
                    $item->route('admin.tournament.news.index');
                    $item->authorize(
                        $this->auth->hasAccess('tournament.news.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
