<?php

namespace App\Admin\Controllers;

use App\Models\OfficialAccount;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;
use Overtrue\Pinyin\Pinyin;

class OfficialController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('列表')
            ->description('')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('公众号')
            ->description('修改')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OfficialAccount);
        $grid->model()->orderBy('id', 'desc');
        $grid->actions(function ($actions) {
            // 去掉查看
            $actions->disableView();
        });

        $grid->id('Id');
        $grid->name('名称');
        $grid->column('link', '链接')->display(function () {
            return '<a target="_blank" href="' . route('index', ['slug' => $this->slug]) . '">点击查看</a>';
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(OfficialAccount::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->avatar('Avatar');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OfficialAccount);

        $form->text('name', '名称');
        $form->image('avatar', '头像')->uniqueName();
        $form->hidden('slug')->default('');
        $form->saving(function (Form $form) {
            if ($form->slug == '') {
                $form->slug = implode('-', (new Pinyin())->convert($form->name));
            }
        });
//        $form->saved(function (Form $form) {
//            $success = new MessageBag([
//                'title'   => '提示',
//                'message' => '保存成功',
//            ]);
//
//            return back()->with(compact('success'));
//        });

        return $form;
    }
}
