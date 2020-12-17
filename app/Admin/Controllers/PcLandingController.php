<?php

namespace App\Admin\Controllers;

use App\Models\PcLanding;
use App\Http\Controllers\Controller;
use App\Models\Template;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PcLandingController extends Controller
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
            ->header('PC落地页')
            ->description('列表')
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
            ->header('PC落地页')
            ->description('新增')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PcLanding);

        $grid->id('Id');
        $grid->domain('投放域名');
        $grid->column('land_url', '落地页链接')->display(function () {
            return 'http://' . $this->domain . '/pc' . ($this->domain_suffix ? '/' . $this->domain_suffix : '');
        });
        $grid->title('标题');
        $grid->qrcode('关注二维码')->image();
        $grid->company('公司主体');
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
        $show = new Show(PcLanding::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->content('Content');
        $show->qrcode('Qrcode');
        $show->reader('Reader');
        $show->company('Company');
        $show->domain('Domain');
        $show->domain_suffix('Domain suffix');
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
        $form = new Form(new PcLanding);

        $form->text('domain', '投放域名')->required();
        $form->text('domain_suffix', '域名后缀');
        $form->select('template_id', '模板')->options(Template::orderBy('id', 'desc')->pluck('name', 'id'))->required();
        $form->text('title', '标题')->required();
        $form->UEditor('content', '内容')->required();
        $form->multipleImage('qrcode', '关注二维码')->removable()->uniqueName()->help('上传多个二维码，将随机展示');
        $form->number('reader', '已读人数')->required();
        $form->text('company', '公司主体')->required();

        return $form;
    }
}
