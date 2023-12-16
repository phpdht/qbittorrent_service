<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\Chart;
use AmisPhp\Renderers\Page;
use App\Logic\Admin\Home;
use App\Logic\Admin\Index;
use EchartsJson\ECharts;
use EchartsJson\Options\Legend;
use EchartsJson\Options\Title;
use function Hyperf\ViewEngine\view;

class IndexController extends Base
{
    protected $nav_index= 'index-chart';

    public function chart()
    {

        $chart = new Chart();
        $chart->api('/admin/index/chart_data');

        $page = new Page();
        $page->title("图表演示");
        $page->body($chart,);


        return $this->amis_home_body($page);

    }


    public function chart_data()
    {
        $json = '{
                "title": {
                    "text": "销售情况"
                },
                "tooltip": {},
                "legend": {
                    "data": [
                        "销量"
                    ]
                },
                "xAxis": {
                    "data": [
                        "衬衫",
                        "羊毛衫",
                        "雪纺衫",
                        "裤子",
                        "高跟鞋",
                        "袜子"
                    ]
                },
                "yAxis": {},
                "series": [
                    {
                        "name": "销量",
                        "type": "bar",
                        "data": [
                            94,
                            73,
                            25,
                            71,
                            57,
                            99
                        ]
                    }
                ]
            }';

        $data = json_decode($json);
        return $this->amis_ok($data);

    }

    public function chart_data2()
    {


        return '{
            "status": 0,
            "msg": "ok",
            "data": {
                "title": {
                    "text": "销售情况"
                },
                "tooltip": {},
                "legend": {
                    "data": [
                        "销量"
                    ]
                },
                "xAxis": {
                    "data": [
                        "衬衫",
                        "羊毛衫",
                        "雪纺衫",
                        "裤子",
                        "高跟鞋",
                        "袜子"
                    ]
                },
                "yAxis": {},
                "series": [
                    {
                        "name": "销量",
                        "type": "bar",
                        "data": [
                            94,
                            73,
                            25,
                            71,
                            57,
                            99
                        ]
                    }
                ]
            }
        }';

    }

}
