<?php

namespace App\Logic\Admin;

use App\Model\AdminMenu;

class Menu
{


    /**
     * 获取顶级菜单
     *
     * @return array[]
     */
    static public function p0list()
    {
        //   "label": "描述",
        //        "value": "值" // ,
        /**
         * @var AdminMenu[] $p0list
         */
        $p0list = AdminMenu::where('parent_id', 0)->get();
//        dump($p0list);
        $res = [
            [
                'label' => '根',
                'value' => 0
            ]
        ];
        foreach ($p0list as $adminMenu) {
            $res[] = [
                'label' => $adminMenu->title . " ( {$adminMenu->uri} ) id: {$adminMenu->id}",
                'value' => $adminMenu->id,
            ];
        }

//        dump($res);

        return $res;
    }

    static public function menulist()
    {

        /**
         * @var AdminMenu[] $list
         */
        $list = AdminMenu::where('show', 1)->get();

        $res = [];
        foreach ($list as $adminMenu) {
            if ($adminMenu->parent_id == 0) {
                $res[$adminMenu->id] = [
                    'label'    => $adminMenu->title,
                    'icon'     => 'fa ' . $adminMenu->icon,
                    'nav'      => self::uri2nav($adminMenu->uri),
                    'children' => [

                    ]
                ];
            }
        }
        foreach ($list as $adminMenu) {
            if ($adminMenu->parent_id > 0) {
                $res[$adminMenu->parent_id]['children'][] = [
                    'label' => $adminMenu->title,
                    'icon'  => 'fa ' . $adminMenu->icon,
                    'nav'   => self::uri2nav($adminMenu->uri),
                    'to'    => $adminMenu->uri
                ];
            }
        }

        return $res;
    }


    private static function uri2nav($uri)
    {
        $nac = str_replace('/', '_', $uri);
        if (substr($nac, 0, 1) == '_') {
            return substr($nac, 1);
        }
        return $nac;
    }
}