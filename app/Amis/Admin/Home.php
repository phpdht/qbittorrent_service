<?php

namespace App\Amis\Admin;

use AmisPhp\Renderers\Container;
use AmisPhp\Renderers\Grid2D;
use AmisPhp\Renderers\GridNav;
use AmisPhp\Renderers\IFrame;
use AmisPhp\Renderers\Nav;
use AmisPhp\Renderers\Page;
use AmisPhp\Renderers\Tab;
use App\Logic\Admin\Menu;
use EchartsJson\Options\Grid;

/**
 * 后台首页,主要是模板
 *
 */
class Home
{
    /**
     * 功能列表
     *  名字 => 网址
     * @var array
     */

    protected $tab  = '';
    protected $body = [];

    protected $data = [];

    public function __construct($tab = '81484')
    {

        $this->tab = $tab ;
    }

    public function index()
    {
        $page = new Page();


        $grid2d = new Grid2D();
        $grid2d->cols(12);
        $grid2d->rowHeight(50);


        $co = new Container();
        $co->body($this->body);
        $co->x(2);
        $co->y(1);
        $co->w(11);
        $co->h(10);


        $grid2d->grids([
            $this->nav(), $co
        ]);
        $page->body($grid2d);
        $page->data($this->data);
        return $page;
    }


    /**
     * @param $b
     * @return $this
     * @author dongasai
     * Date 2023/12/7 17:15
     */
    public function addBody($b)
    {
        $this->body[] = $b;
        return $this;

    }


    /**
     * 设置数据
     * @param $data
     * @return $this
     * @author dongasai
     * Date 2023/12/8 13:48
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }


    private function nav()
    {

        dump($this->tab);


        $nav    = Nav::make();
        $list   = $this->navList();
        $list[] = $this->admin_nav();

        $list[] = $this->devtool_nav();

        $nav->stacked(true);
        $nav->accordion(true);
        foreach ($list as $k => $item) {
            if (($item['nav'] ?? '') == $this->tab) {
                $list[$k]['active'] = true;

            }
            foreach (($item['children'] ?? []) as $k2 => $item2) {

                if (($item2['nav'] ?? '') == $this->tab) {
                    $list[$k]['children'][$k2]['active'] = true;
                }
            }
        }
//        dump($list);

        $nav->links($list);
        $conav = new Container();
        $conav->body($nav);
        $conav->x(1);
        $conav->y(1);
        $conav->w(1);
        $conav->h(10);
        $conav->width('200px');
        return $conav;
    }


    private function navList()
    {
        $list   = [];
        $list[] = [
            "label" => "首页",
            "to"    => "/admin/index",
            "icon"  => "fa fa-home",
            'nav'   => 'index'
        ];

        $list2 = Menu::menulist();
//        dump($list2);
        $list = array_merge($list, $list2);


        return $list;
    }


    private function devtool_nav()
    {
        $nav = [
            "label"    => "DevTool",
            //            "unfolded" => true,
            "icon"     => "fa fa-code",
            'nav'      => 'devtool',
            'children' => [
                [
                    "label" => "路由列表",
                    'icon'  => 'fa fa-exchange',
                    "to"    => "/admin/devtool/router_list"
                ],
                [
                    "label" => "phpinfo",
                    'icon'  => 'fa fa-circle-o',
                    "to"    => "/admin/devtool/phpinfo"
                ],
                [
                    "label" => "官网演示",
                    "to"    => "https://aisuda.bce.baidu.com/amis/examples/index",
                    "icon"  => "fa fa-flag-o",
                    'nav'   => 'demo'
                ],
                [
                    "label" => "图表演示",
                    "to"    => "/admin/index/chart",
                    "icon"  => "fa fa-area-chart",
                    'nav'   => 'index-chart'
                ]
            ]
        ];
        return $nav;
    }

    private function admin_nav()
    {
        $nav = [
            "label"    => "后台",
            //            "unfolded" => true,
            "icon"     => "fa fa-sliders",
            'nav'      => 'admin',
            'children' => [
                [
                    "label" => "管理员列表",
                    "to"    => "/admin/admin_user/index"
                ],
                [
                    "label" => "菜单",
                    "to"    => "/admin/admin_menu/index"
                ]
            ]
        ];
        return $nav;
    }


}