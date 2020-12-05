<?php

namespace App\Admin\Controllers;

use App\Models\Visitor;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class VisitorController extends Controller
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
            ->header('Index')
            ->description('description')
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
            ->header('Edit')
            ->description('description')
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
        $grid = new Grid(new Visitor);

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->equal('adid', '广告计划id');
        });

        $grid->id('Id');
        $grid->platform('平台')->using([
            Visitor::PLATFORM_BAIDU => '百度',
            Visitor::PLATFORM_TOUTIAO => '头条'
        ]);
        $grid->url('落地页url');
        $grid->bd_vid('百度转化token');
        $grid->adid('广告计划id');
//        $grid->ua('Ua');
        $grid->ip('Ip');
//        $grid->appid('Appid');
        $grid->created_at('访问时间');

        $grid->disableActions();

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
        $show = new Show(Visitor::findOrFail($id));

        $show->id('Id');
        $show->url('Url');
        $show->ua('Ua');
        $show->ip('Ip');
        $show->appid('Appid');
        $show->bd_vid('Bd vid');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->page_id('Page id');
        $show->domain('Domain');
        $show->platform('Platform');
        $show->adid('Adid');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Visitor);

        $form->textarea('url', 'Url');
        $form->textarea('ua', 'Ua');
        $form->ip('ip', 'Ip');
        $form->text('appid', 'Appid');
        $form->text('bd_vid', 'Bd vid');
        $form->number('page_id', 'Page id');
        $form->text('domain', 'Domain');
        $form->number('platform', 'Platform')->default(1);
        $form->text('adid', 'Adid');

        return $form;
    }
}
