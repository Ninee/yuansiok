<?php

namespace App\Admin\Controllers;

use App\Models\Domain;
use App\Models\Landing;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LandingController extends Controller
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
        $grid = new Grid(new Landing);

        $grid->id('Id');
        $grid->domain()->domain('域名');
//        $grid->title('标题');
        $grid->copyright('公司主体');
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
        $show = new Show(Landing::findOrFail($id));

        $show->id('Id');
        $show->domain_id('Domain id');
        $show->content('Content');
        $show->copyright('Copyright');
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
        $form = new Form(new Landing);
        $form->select('domain_id', '绑定域名')->options(Domain::all()->pluck('domain', 'id'));
        $form->text('mp_name', '公众号名称');
        $form->text('mp_id', '公众号ID');
        $form->text('mp', '公众号历史消息主页');
        $form->hidden('title', '标题')->default('');
        $form->hidden('cover', '封面图')->default('');
        $form->UEditor('content', '内容');
        $form->text('copyright', '公司主体');

        return $form;
    }
}
