<?php


namespace App\Admin\Action;


use Encore\Admin\Admin;

class PageCopy
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.page-copy').on('click', function () {

    // Your code.
    console.log($(this).data('id'));
    $.ajax({
        method: 'post',
        url: '/admin/page/copy',
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

        return "<a class='fa fa-copy page-copy' data-id='{$this->id}'>复制</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}