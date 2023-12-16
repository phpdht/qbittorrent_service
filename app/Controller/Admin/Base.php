<?php

namespace App\Controller\Admin;

use App\Amis\View;
use App\Controller\AbstractController;
use App\Logic\Admin\Home;

use function Hyperf\ViewEngine\view;

class Base extends AbstractController
{

    use View;


    public function return_amis_data($status, $msg = '', $data = [])
    {
        return [
            "status" => $status,
            'msg'    => $msg,
            'data'   => $data
        ];
    }

    /**
     * amis格式 的成功数据
     *
     * @param $data
     * @param $msg
     * @return array
     * @author dongasai
     * Date 2023/12/6 16:01
     */
    public function amis_ok($data = [], $msg = 'ok')
    {
        return $this->return_amis_data(0, $msg, $data);

    }


    /**
     * amis格式 成功的提示信息
     *
     * @param $msg
     * @param $data
     * @return array
     * @author dongasai
     * Date 2023/12/9 11:54
     */
    public function amis_success($msg, $data = [])
    {
        return $this->return_amis_data(0, $msg, $data);
    }

    /**
     * amis格式 错误的提示信息
     * @param $msg
     * @param $data
     * @return array
     * @author dongasai
     * Date 2023/12/9 11:54
     */
    public function amis_error($msg, $data = [])
    {
        return $this->return_amis_data(1, $msg, $data);
    }

}