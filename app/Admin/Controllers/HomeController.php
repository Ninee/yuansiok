<?php

namespace App\Admin\Controllers;

use App\Admin\Extension\PostBack;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
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
            });
    }
}
