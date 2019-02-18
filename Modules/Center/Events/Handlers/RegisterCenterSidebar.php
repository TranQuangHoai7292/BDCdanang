<?php

namespace Modules\Center\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterCenterSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Trung Tâm Thể Thao'), function (Item $item) {
                $item->icon('fa fa-home');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Danh Sách Trung Tâm'), function (Item $item) {
                    $item->icon('fa fa-home');
                    $item->weight(0);
                    $item->append('admin.center.center.create');
                    $item->route('admin.center.center.index');
                    $item->authorize(
                        $this->auth->hasAccess('center.centers.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
