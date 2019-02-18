<?php

namespace Modules\Club\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterClubSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('club::clubs.title.clubs'), function (Item $item) {
                $item->icon('fa fa-cubes');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('club::clubs.title.clubs'), function (Item $item) {
                    $item->icon('fa fa-cubes');
                    $item->weight(0);
                    $item->append('admin.club.club.create');
                    $item->route('admin.club.club.index');
                    $item->authorize(
                        $this->auth->hasAccess('club.clubs.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
