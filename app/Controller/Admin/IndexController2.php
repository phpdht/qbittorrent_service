<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\Chart;
use AmisPhp\Renderers\Page;
use App\Amis\Admin\Index;
use EchartsJson\ECharts;
use EchartsJson\Options\Legend;
use EchartsJson\Options\Title;
use function Hyperf\ViewEngine\view;

class IndexController2 extends Base
{




    public function chart()
    {

        $chart = new Chart();
        $chart->api('/admin/index/chart_data');


        $page = new Page();
        $page->title("图标演示");
        $page->body($chart);
        return view("admin/amis1", [
                'amisjstring' => $page
            ]
        );
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
        $data = json_decode($json,true);
       return  $this->amis_ok($data);

    }

}
