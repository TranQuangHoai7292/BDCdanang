<?php

namespace Modules\Service\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterServiceSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Dịch Vụ'), function (Item $item) {
                $item->icon('fa fa-handshake-o');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Dịch Vụ Thuê Sân'), function (Item $item) {
                    $item->icon('fa fa-handshake-o');
                    $item->weight(0);
                    $item->append('admin.service.service.create');
                    $item->route('admin.service.service.index');
                    $item->authorize(
                        $this->auth->hasAccess('service.services.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
