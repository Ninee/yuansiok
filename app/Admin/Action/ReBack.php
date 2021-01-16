<?php


namespace App\Admin\Action;


use Encore\Admin\Admin;

class ReBack
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.reback-btn').on('click', function () {

    // Your code.
    console.log($(this).data('id'));
    $.ajax({
        method: 'post',
        url: '/admin/baidu/reback',
        data: {
            _token:LA.token,
            id: $(this).data('id')
        },
        success: function (res) {
            console.log(res)
            if(res.code == 0){
                toastr.success('操作成功');
                $.pjax.reload('#pjax-container');
            } else {
                toastr.error(res.message);
            }

        }
    });

});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='fa fa-repeat reback-btn' data-id='{$this->id}' style='margin: 0 6px'>重新调试</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}