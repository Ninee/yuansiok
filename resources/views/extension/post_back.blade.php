<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">百度</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->


        <div class="box-body">
            <div class="form-horizontal">
                <div class="form-group">

                    <label for="baidu" class="col-sm-2  control-label">落地页</label>

                    <div class="col-sm-8">
                        <select id="baiduPage" class="form-control" style="width: 100%;" name="baiduPage">
                                <option value=""></option>
                                @foreach($pages as $select => $option)
                                    <option value="{{$select}}" {{$loop->first ? 'selected' : ''}}>{{$option}}</option>
                                @endforeach
                        </select>

                    </div>
                </div>
                <button id="baiduBtn" type="submit" class="btn btn-primary">回传</button>
            </div>
        </div>
        <!-- /.box-body -->

</div>

<script>
    $(function () {
        $('#baiduPage').select2().trigger('change');
        $('#baiduBtn').on('click', function () {
            console.log($('#baiduPage').val())
            var page_id = $('#baiduPage').val()
            $.ajax({
                method: 'post',
                url: '/admin/api/post_back/baidu',
                data: {
                    _token:LA.token,
                    page_id: page_id
                },
                success: function (res) {
                    console.log(res)
                    if(res.code == 0){
                        toastr.success('操作成功');
                    } else {
                        toastr.error(res.message);
                    }

                }
            });
        })
    })

</script>