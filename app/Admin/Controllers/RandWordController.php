<?php

namespace App\Admin\Controllers;

use App\Models\RandWord;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class RandWordController extends Controller
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
            ->header('随机词')
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
        $grid = new Grid(new RandWord);
        $grid->model()->orderBy('id', 'desc');

//        $grid->id('Id');
        $grid->word('词语');
        $grid->column('user.username', '贡献者');

        $grid->actions(function ($actions) {

            // 去掉删除
//            $actions->disableDelete();

            // 去掉编辑
//            $actions->disableEdit();

            // 去掉查看
            $actions->disableView();
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
        $show = new Show(RandWord::findOrFail($id));

        $show->id('Id');
        $show->word('Word');
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
        $form = new Form(new RandWord);

        $form->textarea('word', '词语')->help('输入多个词语，一个词一行');
        $form->hidden('user_id', '贡献者')->default(Admin::user()->id);
        $form->saving(function ($form) {
            $words = explode("\r\n", $form->word);
            $had = [];
            //查重
            foreach ($words as $word) {
                $repeat = RandWord::where('word', $word)->first();
                if ($repeat) {
                    array_push($had, $word);
                }
            }
            //剔除已有词
            $result = array_diff($words, $had);
            foreach ($result as $word) {
                RandWord::create([
                    'word' => $word,
                    'user_id' => $form->user_id
                ]);
            }
            return redirect('/admin/rand_words');
//            if (!empty($had)) {
//                $error = new MessageBag([
//                    'title'   => '错误',
//                    'message' => '词库中已有词汇：' . implode('、', $had),
//                ]);
//
//                return back()->with(compact('error'));
//            } else {
//                foreach ($words as $word) {
//                    RandWord::create([
//                        'word' => $word,
//                        'user_id' => $form->user_id
//                    ]);
//                }
//                return redirect('/admin/rand_words');
//            }
        });

        return $form;
    }
}
