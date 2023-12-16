<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\Page;
use App\Controller\AbstractController;
use App\Logic\Admin\Home;
use App\Logic\Admin\Index;
use function Hyperf\ViewEngine\view;

class HomeController extends Base
{
    public function index()
    {
        $page = new Page();
        $page->title("首页");
        return $this->amis_home_body($page);

    }


}
