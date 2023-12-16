<?php

namespace App;

use Hyperf\Di\Container;
use Hyperf\HttpServer\Contract\RequestInterface;

class Di
{

    /**
     * 获取请求对象
     * @return RequestInterface|mixed
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @author dongasai
     * Date 2023/12/10 16:38
     */
    static public function getRequest()
    {
//        RequestInterface::class;
       return  \Hyperf\Context\ApplicationContext::getContainer()->get(RequestInterface::class);
    }

}