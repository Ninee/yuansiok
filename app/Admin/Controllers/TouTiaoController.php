<?php

namespace App\Admin\Controllers;

use App\Models\BaiduClue;
use App\Models\Mp;
use App\Models\Template;
use App\TouTiao;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TouTiaoController extends Controller
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
        $grid = new Grid(new TouTiao);

        $grid->model()->orderBy('id', 'desc');
        $grid->id('Id');
        $grid->remark('备注');
        $grid->column('land_url', '落地页链接')->display(function () {
            return 'http://' . $this->domain . ($this->domain_suffix ? '/' . $this->domain_suffix : '');
        });
        $grid->column('baidu_debug', '百度联调url')->display(function ($id) {
           return 'http://' . $this->domain . ($this->domain_suffix ? '/' . $this->domain_suffix : '') . '?debug=' . $this->appid;
        });
        $grid->template()->name('模板');
        $grid->title('标题');
        $grid->name('公众号');
        $grid->created_at('创建时间');
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
        $show = new Show(TouTiao::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->content('Content');
        $show->avatar('Avatar');
        $show->name('Name');
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
        $form = new Form(new TouTiao);

        $form->text('remark', '备注')->help('用于区分落地页，仅自己可见');
        $form->text('domain', '投放域名');
        $form->text('domain_suffix', '域名后缀');
        $form->select('template_id', '模板')->options(Template::all()->pluck('name', 'id'));
        $form->text('title', '标题');
        $form->UEditor('content', '内容');
        $form->image('avatar', '公众号头像')->uniqueName();
        $form->text('name', '公众号名称');
        $form->text('mp_weixin', '公众号微信号');
        $form->select('appid', '公众号appid')->options(Mp::all()->pluck('name', 'appid'))->help('选择百度自定义回传时必选');
        $form->text('channel_id', '公众号历史链接');
        $form->select('baidu_clue', '百度转化线索')->options(BaiduClue::all()->pluck('name', 'token'))->help('百度投放付费回传时必选');
        $form->tags('rand_suffix', '随机后缀');
        $form->text('company', '公司名称');
        return $form;
    }
}