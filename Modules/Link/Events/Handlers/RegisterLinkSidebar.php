<?php

namespace Modules\Link\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterLinkSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('link::links.title.links'), function (Item $item) {
                $item->icon('fa fa-link');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('link::links.title.links'), function (Item $item) {
                    $item->icon('fa fa-link');
                    $item->weight(0);
                    $item->append('admin.link.link.create');
                    $item->route('admin.link.link.index');
                    $item->authorize(
                        $this->auth->hasAccess('link.links.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
