<?php

declare(strict_types=1);

namespace App\Controller\Admin;


use AmisPhp\Renderers\CRUD;
use AmisPhp\Renderers\Property;
use AmisPhp\Renderers\PropertyItem;
use AmisPhp\Renderers\Table\TableColumn;
use App\Model\Account;
use App\Model\AdminUser;
use App\Model\User;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;


/**
 *  用户 控制器
 *
 */
#[Controller(prefix: '/admin/admin_user')]
class AdminUserController extends Base
{
    protected $nav_index = 'admin_user';


    #[GetMapping(path: 'index')]
    public function index()
    {

        $crud = CRUD::make();
        $crud->api('/admin/admin_user/list_data');
        $crud->autoGenerateFilter(true);
        $cls   = [];
        $cls[] = TableColumn::make()->name('id')->label("管理员ID");
        $cls[] = TableColumn::make()->name('username')->label("登录名");
        $cls[] = TableColumn::make()->name('name')->label("姓名");

        $cls[] = TableColumn::make()->label("操作")->type('operation')->buttons([
            (\AmisPhp\Pro\ButtonIframe::make())->title("H5详情")->src("/admin/admin_user/info/\$id")
            // modal 打开的 详情,使用iframe
        ]);

        $crud->columns($cls);
        return $this->amis_home_body($crud);
    }

    #[GetMapping(path: 'list_data')]
    public function list_data()
    {
        $page = $this->list1_readlist();

        $data = [
            "items" => $page->items(),
            'total' => $page->total(),
            'page'  => $page->currentPage()
        ];

        return $this->amis_ok($data);
    }


    #[GetMapping(path: 'info/{id}')]
    public function info($id)
    {

        $info  = AdminUser::find($id);
        $items = [];

        $items[] = PropertyItem::make()->label("用户ID")->content("\$id")->span(4);
        $items[] = PropertyItem::make()->label("username")->content("\$username")->span(4);
        $items[] = PropertyItem::make()->label("名字")->content("\$name")->span(4);

        $property = Property::make()->title("详细信息")->items($items);
        $property->items($items);

        return $this->amis_page($property, $info);
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
        $perpage = $this->request->query('perPage', 10);
//        dump($perpage);
        $list = AdminUser::paginate((int)$perpage, ["*"]);

        return $list;

    }

}
