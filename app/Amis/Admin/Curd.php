<?php

namespace App\Amis\Admin;

use AmisPhp\Renderers\CRUD;
use AmisPhp\Renderers\Table\TableColumn;
use App\Amis\View;

class Curd
{

    use View;

    public $id = '';


    /**
     * 是否为单页面
     *
     * (单页面没有菜单等东西)
     *
     * @var bool
     */
    public $is_page = false;

    /**
     * 列表 数据的地址
     *
     * @var string
     */
    public $list_data_api = '';

    /**
     * 数据详情的地址
     *
     * @var string
     */
    public $info_url      = '';

    /**
     * 编辑数据的地址
     * @var string
     */
    public $edit_url      = '';

    /**
     * 增加数据的地址
     * @var string
     */
    public $add_url      = '';

    /**
     * 复制数据的地址
     * @var string
     */
    public $copy_url      = '';

    /**
     * 列中增加创建时间和更新时间
     * @var bool
     */
    public $cls_add_cu_at      = true;
    /**
     * 是否一次性加载
     *
     * @var bool
     */
    public $loadDataOnce = false;



    /**
     * 列数据情况
     * @var array
     */
    public $cls = [];

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function render()
    {

        $cuedActions = [];
        $crud        = CRUD::make();

        $crud->api($this->list_data_api);
        $crud->id($this->id);
        $crud->autoGenerateFilter(true);

        $crud->loadDataOnce($this->loadDataOnce);
        $toolbar = [ 'reload' ];


        if ($this->add_url) {
            $add       = (\AmisPhp\Pro\ButtonIframe::make())->title("新增")->src($this->add_url);
            $toolbar[] = $add;
        }

        $crud->headerToolbar($toolbar);

        if ($this->edit_url) {
            $edit = (\AmisPhp\Pro\ButtonIframe::make())
                ->title("编辑")
                ->src($this->edit_url);
            $edit->init();

            $event = [
                'confirm' => [
                    'actions' => [
                        [
                            'actionType'  => 'reload',
                            'componentId' => $this->id
                        ]
                    ]
                ]
            ];
            $edit->dialog->onEvent($event);
            $cuedActions[] = $edit;
        }
        if ($this->info_url) {
            $info          = (\AmisPhp\Pro\ButtonIframe::make())
                ->title("详情")
                ->src($this->info_url);
            $info->init();
            $event = [
                'confirm' => [
                    'actions' => [
                        [
                            'actionType'  => 'reload',
                            'componentId' => $this->id
                        ]
                    ]
                ]
            ];
            $info->dialog->onEvent($event);

            $cuedActions[] = $info;
        }

        if ($this->copy_url) {
            $info          = (\AmisPhp\Pro\ButtonIframe::make())
                ->title("复制一条")
                ->src($this->copy_url);
            $info->init();
            $event = [
                'confirm' => [
                    'actions' => [
                        [
                            'actionType'  => 'reload',
                            'componentId' => $this->id
                        ]
                    ]
                ]
            ];
            $info->dialog->onEvent($event);

            $cuedActions[] = $info;
        }


        if($this->cls_add_cu_at){
            $this->addClsCreateAt();
            $this->addClsUpdateAt();
        }

        if ($cuedActions) {
            $this->cls[] = TableColumn::make()->label("操作")->type('operation')->buttons($cuedActions);
        }


        $crud->columns($this->cls);

        return $this->amis_home_body([ $crud ]);
    }


    /**
     * 列中增加创建时间
     *
     * @return $this
     * @author dongasai
     * Date 2023/12/10 17:24
     */
    public function addClsCreateAt()
    {
        $this->cls [] = TableColumn::make()->name('created_at')->label("创建时间")->width('140px');
        return $this;

    }

    public function addClsUpdateAt()
    {
        $this->cls [] = TableColumn::make()->name('updated_at')->label("更新时间时间")->width('140px');;
        return $this;

    }

}