<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 28/06/2020
 * Time: 16:59
 */

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct()
    {
    }

    public function getAllModule($data_modules_group)
    {
        if(isset($data_modules_group['data']))
        {
            $data_modules_group = $data_modules_group['data'];

            foreach ($data_modules_group as $key_g => $modules_g)
            {
                $data_module = $modules_g['modules_group']['data'];

                $per_module_group = [];

                foreach ($data_module as $key => $module)
                {
                    array_push($per_module_group, $module['permission']);
                    $module = $this->handleMenu($module);
                    unset($data_module[$key]);
                    $data_module[$key] = $module;
                }
                unset($modules_g['modules_group']['data']);

                $modules_g['modules_group']['data'] = $data_module;

                $modules_g['permission_module'] = $per_module_group;

                $data_modules_group[$key_g] = $modules_g;

            }
            return $data_modules_group;
        }
        return false;
    }

    private function handleMenu($data = [])
    {
        $menu = $data['menu'];
        $menu_route = $data['menu_route'];
        $menu_permission = $data['menu_permission'];

        $data_menu = [];
        foreach ($menu as $key => $me)
        {
            $data_menu[$key][] = $me;
        }
        foreach ($menu_route as $key => $menu_r)
        {
            $data_menu[$key][] = $menu_r;
        }
        foreach ($menu_permission as $key => $menu_p)
        {
            $data_menu[$key][] = $menu_p;
        }
        unset($data['menu'], $data['menu_route'], $data['menu_permission']);

        $data['menu'] = $data_menu;

        return $data;
    }

    public function getAdminPermissions($admin)
    {
        $admin = json_decode($admin->getContent(),1);
        return $admin['data']['permissions'];
    }
}
