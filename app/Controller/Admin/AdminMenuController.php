<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\Action\ReloadAction;
use AmisPhp\Renderers\CRUD;
use AmisPhp\Renderers\Form\AmisForm;
use AmisPhp\Renderers\Form\IconPicker;
use AmisPhp\Renderers\Form\InputText;
use AmisPhp\Renderers\Form\Select;
use AmisPhp\Renderers\Property;
use AmisPhp\Renderers\PropertyItem;
use AmisPhp\Renderers\Table\TableColumn;
use App\Logic\Admin\Menu;
use App\Model\AdminMenu;
use App\Model\AdminUser;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;


/**
 *  用户 控制器
 *
 */
#[Controller(prefix: '/admin/admin_menu')]
class AdminMenuController extends Base
{

    protected $nav_index = 'admin_menu';


    #[GetMapping(path: 'index')]
    public function index()
    {

        $crud = CRUD::make();
        $add = (\AmisPhp\Pro\ButtonIframe::make())->title("新增")->src("/admin/admin_menu/edit/0");

        //  "headerToolbar": [
        //      "reload"
        //    ],
        $crud->api('/admin/admin_menu/list_data');
        $crud->id('admin_menu_index');
        $crud->autoGenerateFilter(true);
        $crud->loadDataOnce(true);
        $crud->headerToolbar([
            'reload',$add
                             ]);
        $cls   = [];
        $cls[] = TableColumn::make()->name('id')->label("管理员ID");
        $cls[] = TableColumn::make()->name('order')->label("排序");
        $cls[] = TableColumn::make()->name('title')->label("标题");
        $cls[] = TableColumn::make()
            ->name('icon')
            ->label("图标")
            ->type('icon')
            ->icon('$icon');

        $cls[] = TableColumn::make()->name('uri')->label("路径");

        $edit = (\AmisPhp\Pro\ButtonIframe::make())
            ->title("编辑")
            ->src("/admin/admin_menu/edit/\$id");
        $edit->init();

        $event = [
            'confirm'=>[
                'actions'=>[
                   [
                       'actionType'=>'reload',
                       'componentId'=>'admin_menu_index'
                   ]
                ]
            ]
        ];
        $edit->dialog->onEvent($event);

        // modal 打开的 详情,使用iframe

        $cls[] = TableColumn::make()->label("操作")->type('operation')->buttons([
                                                                                    $edit
                                                                                ]);


        $crud->columns($cls);

        return $this->amis_home_body([$crud]);
    }

    #[GetMapping(path: 'list_data')]
    public function list_data()
    {
        $list = $this->list1_readlist();

        $data = [
            "items" => $list
        ];

        return $this->amis_ok($data);
    }


    #[GetMapping(path: 'edit/{id}')]
    public function edit($id)
    {

        if($id){
            $info  = AdminMenu::find($id);

        }else{
            $info  = new AdminMenu();
            $info->title = '';
            $info->id = 0;
            $info->icon = '';
            $info->parent_id = 0;
            $info->order = 0;
            $info->uri = '-';
        }
        $items = [];

        $items[] = InputText::make()->label("标题")->value("\$title")->name('title');


        $items[] = InputText::make()->label("图标")
            ->value("\$icon")
            ->name('icon')->description('图标这里找  <a href=\"https://fontawesome.com/v4/icons/\" target=\"_blank\">fontawesome.com</a> <a href=\"http://www.wapadd.cn/icons/awesome/index.htm\" target=\"_blank\">三方</a>   <a href=\"https://fa.uutool.cn/icons/4.4.0/\" target=\"_blank\">三方2</a>   ');
//        https://fontawesome.com/v4/icons/

        $items[] = Select::make()->label("上级")->multiple(false)
            ->value("\$parent_id")->name('parent_id')->options(Menu::p0list());


        $items[] = InputText::make()->label("排序")->value("\$order")->name('order');
        $items[] = InputText::make()->label("地址")->value("\$uri")->name('uri');
        $items[] = InputText::make()->label("ID")->value("\$id")->name('id')->hidden(true);


        $form = AmisForm::make()->title("详细信息")->mode('horizontal');
        $form->body($items);
        $form->api('/admin/admin_menu/edit_post');

        return $this->amis_page($form, $info);
    }


    #[PostMapping(path: 'edit_post')]
    public function edit_post()
    {
        $data = $this->request->post();
//        dump($data);

        if($data['id']){
            $info  = AdminMenu::find($data['id']);
        }else{
            $info  = new AdminMenu();
        }

        $info->setData($data);
        $info->save();
        return $this->amis_success('成功');
    }

    /**
     *
     * @return \Hyperf\Contract\LengthAwarePaginatorInterface
     * @author dongasai
     *
     *
     */
    private function list1_readlist()
    {

        /**
         * @var AdminMenu[] $list
         */
        $list = AdminMenu::get();
        $res  = [];
        foreach ($list as $item) {
            if (!$item->parent_id) {
                $res[$item->id] = $item->toArray();
            }

        }
        foreach ($list as $item) {
            if (!$item->parent_id) {

            } else {
                $res[$item->parent_id]['children'][] = $item->toArray();;
            }
        }

        $res2 = [];
        foreach ($res as $item) {
            $res2[] = $item;
        }

        return $res2;

    }

}
