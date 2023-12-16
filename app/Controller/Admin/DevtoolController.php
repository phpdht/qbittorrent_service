<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\IFrame;
use AmisPhp\Renderers\Json;
use AmisPhp\Renderers\Service;
use AmisPhp\Renderers\Table\Table;
use AmisPhp\Renderers\Table\TableColumn;
use AmisPhp\Renderers\Tpl;
use Hyperf\Contract\ContainerInterface;
use Hyperf\Database\Schema\Column;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Router\Dispatched;
use Hyperf\HttpServer\Router\DispatcherFactory;
use Hyperf\HttpServer\Router\Handler;
use Hyperf\HttpServer\Router\Router;
use function Hyperf\ViewEngine\view;

#[Controller(prefix: '/admin/devtool')]
class DevtoolController extends Base
{
    protected $nav_index = 'devtool';


    #[GetMapping]
    public function router_list()
    {

        $table = new Table();
        $table->api('');
        $cls =[];
        $cls[] = (new  TableColumn())->name('path')->label("PATH");
        $cls[] = (new  TableColumn())->name('call')->label("CALL");

        $table->columns($cls);

        $service = new Service();
        $service->api('/admin/devtool/router_listdata');
        $service->body($table);

        return $this->amis_home_body($service);
    }

    /**
     * @return void
     * @author dongasai
     * Date 2023/12/9 16:34
     */
    #[GetMapping(path: 'phpinfo')]
    public function phpinfo()
    {

        $iframe = new IFrame();
        $iframe->src('/admin/devtool/phpinfo2');
        $iframe->height('95vh');
        return $this->amis_home_body($iframe);
    }

    #[GetMapping(path: 'phpinfo2')]
    public function phpinfo2()
    {
        ob_start();
        phpinfo();
        $phpinfoAsString = ob_get_contents();
        ob_get_clean();
        return $phpinfoAsString;

    }

    #[GetMapping]
    public function router_listdata()
    {
        $container = \Hyperf\Context\ApplicationContext::getContainer();
        /**
         * @var \Hyperf\HttpServer\Router\DispatcherFactory $dis
         */
        $dis =$container->get(DispatcherFactory::class);
        $router_data = $dis->getRouter('http')->getData();

        $router_list = [];
        foreach ($router_data as $router_datum){
            foreach ($router_datum as $item){
//                dump($item);


                foreach ($item as $handle) {
//                    dump($handle);
                    if($handle  instanceof \Hyperf\HttpServer\Router\Handler){
                        $this->callRouterHandle($handle,$router_list);

                    }elseif (is_array($handle)){
                        dump($handle);
                        if(isset($handle['routeMap'])){
                            foreach ($handle['routeMap'] as $item90){
                                if($item90[0] instanceof  Handler){
                                    $this->callRouterHandle($item90[0],$router_list);
                                }
                            }
                        }

                    }


                }
            }
        }
        return $this->amis_ok($router_list);
    }



    private function callRouterHandle($handle,&$router_list){
        if(is_callable($handle->callback )){
            $router_list[] = [
                'path' => $handle->route,
                'call' => 'call'
            ];
        }
        if(is_array($handle->callback)){
            $router_list[] = [
                'path' => $handle->route,
                'call' => $handle->callback
            ];
        }
        if(is_string($handle->callback)){
            $router_list[] = [
                'path' => $handle->route,
                'call' => $handle->callback
            ];
        }
    }
}
