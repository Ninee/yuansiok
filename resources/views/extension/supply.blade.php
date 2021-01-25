<style>
    table{
        display: table;
    }
    table{
        table-layout:fixed;
        word-wrap: break-word;
    }
</style>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">头条</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <div class="box-body">
        <div class="form-horizontal">
            <div class="form-group">

                <label for="baidu" class="col-sm-2 asterisk control-label">计划id或订单号</label>

                <div class="col-sm-8">
                    <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>

                        <input required="1" type="text" id="toutiao_plan" name="toutiao_plan" value="" class="form-control" placeholder="输入计划id或者订单号">

                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-2 asterisk control-label">类型</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" name="type" value="1" class="minimal" checked />&nbsp;计划id&nbsp;&nbsp;
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="type" value="2" class="minimal"/>&nbsp;订单号&nbsp;&nbsp;
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">

                <label for="back_rate" class="col-sm-2 asterisk control-label">书城</label>

                <div class="col-sm-8">
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" name="book_platform" value="1" class="minimal" checked/>&nbsp;花生&nbsp;&nbsp;
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="book_platform" value="2" class="minimal"/>&nbsp;网易文鼎&nbsp;&nbsp;
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="book_platform" value="3" class="minimal"/>&nbsp;元初&nbsp;&nbsp;
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="book_platform" value="4" class="minimal"/>&nbsp;阅文&nbsp;&nbsp;
                        </label>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="btn-group pull-left">
                        <button id="searchBtn" type="button" class="btn btn-info submit btn-sm"><i class="fa fa-search"></i>&nbsp;&nbsp;搜索</button>
                    </div>
                    <div class="btn-group pull-left " style="margin-left: 10px;">
                        <button type="button" class="btn btn-primary btn-sm import-excel"><i class="fa fa-upload"></i>&nbsp;&nbsp;上传订单表格</button>
                        <input style="display: none" name="orders" type="file" value="上传文件" id="file" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.box-body -->

</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">订单记录</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>订单号</th>
                    <th style="width: 50px;">充值金额</th>
                    <th>下单时间</th>
                    <th>关注时间</th>
                    <th>计划id</th>
                    <th style="width: 200px;">落地页url</th>
                    <th>访问IP</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="data">
                <div style="display: none" id="loading">加载中...</div>
            </tbody>
        </table>
    </div>
</div>

<script src="{{asset('js/ajaxfileupload.js')}}"></script>
<script>
    $(function () {

        function updateTable(data)
        {
            var table = '';
            for(var i = 0; i < data.length; i ++) {
                var tr = '<tr>' + '<td>'+ data[i].order_id + '</td>' + '<td>'+ data[i]['amount'] / 100 + '</td>' + '<td>'+ data[i]['order_time'] + '</td>' + '<td>'+ data[i]['reg_time'] + '</td>' + '</td>' + "<td>" + data[i]['adid'] + '</td>' + '<td style="width: 150px;">'+ data[i]['url'] + '</td>' + '<td>'+ data[i]['ip'] + '</td>' + '<td>'+ "<button class='supply-btn btn btn-danger' data-order='"+ data[i]['order_id'] + "' data-adid='" + data[i]['adid']  +"'>补单</button>" + '</td>' + '</tr>';
                table += tr;
            }
            $('#data').html(table);
        }

        $('#searchBtn').on('click', function () {
            var plan_id = $('#toutiao_plan').val()
            var type = $("input[name='type']:checked").val();
            var book_platform = $("input[name='book_platform']:checked").val();
            $('#data').html('');
            $('#loading').show()
            $.ajax({
                method: 'get',
                url: '/admin/api/get_supply',
                data: {
                    _token:LA.token,
                    book_platform: book_platform,
                    plan_id: plan_id,
                    type: type
                },
                success: function (res) {
                    $('#loading').hide()
                    console.log(res)
                    if(res.code == 0){
                        toastr.success('操作成功');
                        var data = res.data;
                        updateTable(data);
                        // $.pjax.reload('#pjax-container');
                    } else {
                        toastr.error(res.message);
                    }

                }
            });
        })
        $('#data').on('click', '.supply-btn', function () {
            var order = $(this).data('order');
            var adid = $(this).data('adid');
            var that = this;
            var book_platform = $("input[name='book_platform']:checked").val();
            $.ajax({
                method: 'post',
                url: '/admin/api/supply',
                data: {
                    _token:LA.token,
                    book_platform: book_platform,
                    order: order,
                    adid: adid
                },
                success: function (res) {
                    console.log(res)
                    $(that).parent().parent().remove();
                    if(res.code == 0){
                        toastr.success('操作成功');
                    } else {
                        toastr.error(res.message);
                    }

                }
            });
        })

        $(".import-excel").on('click', function () {
            $("#file").click();
        })

        $('#file').change(function () {
            $('#loading').show();
            $('#data').html('');
            $.ajaxFileUpload({
                url:"/admin/api/supply/upload", //你处理上传文件的服务端
                secureuri:false,
                fileElementId:'file',//与页面处理代码中file相对应的ID值
                processData : false,
                contentType : false,
                dataType: 'json', //返回数据类型:看后端返回的是什么数据
                data: {
                    _token:LA.token
                },
                success: function (data, status) {
                    console.log(data);
                    $('#loading').hide();
                    updateTable(data.data)
                },
                error: function(data, status, e){ //提交失败自动执行的处理函数
                    alert(e);
                }
            })

        });

    })

</script>