<?php

namespace App\Amis;

use AmisPhp\Renderers\Page;
use App\Amis\Admin\Home;
use App\Di;
use function Hyperf\ViewEngine\view;
use function Swoole\Coroutine\Http\request;

trait View
{
    /**
     * 导航索引
     * @var string
     */
    protected $nav_index = 'gthytjrehejhrthdeferhrt';

    public function amis_home_body($page, $data = [])
    {
        $no_layout = Di::getRequest()->query('in_iframe',0);

        if($no_layout){
            return $this->amis_page($page,$data);
        }
        $home = new Home($this->nav_index);
        $home->addBody($page);
        $home->setData($data);
        return view("admin/amis1", [
                'amisjstring' => $home->index()
            ]
        );
    }

    /**
     * 进行amis 渲染
     * @param $page
     * @return \Hyperf\ViewEngine\Contract\FactoryInterface|\Hyperf\ViewEngine\Contract\ViewInterface
     * @author dongasai
     * Date 2023/12/8 14:12
     */
    public function amis_body($page)
    {

        return view("admin/amis1", [
                'amisjstring' => $page
            ]
        );
    }


    /**
     * 进行amis 渲染 预制Page
     * @param $body
     * @param $data
     * @return \Hyperf\ViewEngine\Contract\FactoryInterface|\Hyperf\ViewEngine\Contract\ViewInterface
     * @author dongasai
     * Date 2023/12/8 14:18
     */
    public function amis_page($body, $data = [])
    {
        $page = new Page();
        $page->body($body);
        $page->data($data);

        return view("admin/amis1", [
                'amisjstring' => $page
            ]
        );
    }

}