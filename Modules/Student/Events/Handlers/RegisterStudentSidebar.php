<?php

namespace Modules\Student\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterStudentSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
        $menu->group(trans('Quản Trị Tuyển Sinh'), function (Group $group) {
            $group->item(trans('student::students.title.students'), function (Item $item) {
                $item->icon('fa fa-graduation-cap');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('student::students.title.students'), function (Item $item) {
                    $item->icon('fa fa-graduation-cap');
                    $item->weight(0);
                    $item->append('admin.student.student.create');
                    $item->route('admin.student.student.index');
                    $item->authorize(
                        $this->auth->hasAccess('student.students.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
