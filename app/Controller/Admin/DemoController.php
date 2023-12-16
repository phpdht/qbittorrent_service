<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use AmisPhp\Renderers\Button;
use AmisPhp\Renderers\Page;
use AmisPhp\Renderers\Tab;
use App\Controller\AbstractController;

use App\Logic\Admin\Index;
use Hyperf\View\RenderInterface;
use function Hyperf\ViewEngine\view;

class DemoController extends AbstractController
{

    public function index( )
    {
        return view("admin/amis1", [
            'amisjstring' => []
            ]
        );
    }



}
