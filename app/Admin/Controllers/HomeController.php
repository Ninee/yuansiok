<?php

namespace App\Admin\Controllers;

use App\Admin\Extension\PostBack;
use App\Http\Controllers\Controller;
use App\Models\VirtualBackRecord;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }

    public function postBack(Content $content)
    {
        return $content
            ->header('付费回传')
            ->description('虚拟回传')
            ->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    $column->append(PostBack::home());
                });
                $row->column(6, function (Column $column) {
                    $grid = new Grid(new VirtualBackRecord);
                    $grid->header(function () {
                       return '操作记录';
                    });
                    $grid->model()->orderBy('id', 'desc');
                    $grid->column('id', 'ID');
                    $grid->column('platform', '平台');
                    $grid->column('adid', '计划ID');
                    $grid->column('page_remark', '落地页');
                    $grid->column('page_url','访问url');
                    $grid->column('created_at', '回传时间');
                    $grid->disableActions();
                    $grid->disableCreateButton();
                    $grid->disableColumnSelector();
                    $grid->disableExport();
                    $grid->disableFilter();
                    $grid->disableTools();
                    $column->append($grid);
                });

            });
    }
}
