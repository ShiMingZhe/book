@extends('miniprogram.template.main')
@section('content')
<style>
    .mk-content {
        min-height: 130px;
    }
</style>
<!-- Main content -->
<section>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">绑定协管员</h3>
        </div>
        <div class="box-body">
            <div class="content-header">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="请输入协管员邮箱或手机号" id="bind">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="content mk-content">
                <table class="table table-hover" id="table_search_user">
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>性别</th>
                        <th>邮箱</th>
                        <th>手机号</th>
                        <th>注册日期</th>
                        <th>操作</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
$(function () {
    $("button").click(function () {
        let input = $("#bind").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url:'/outer/users/search/user',
            data: {
                table_search:input
            },
            dataType: 'json',
            async: 'false',
            success:function (data) {
                if ($.isArray(data)) {
                    let tr = '<tr><td>用户</td><td>'+input+'</td><td>还没有注册，注册之后进行绑定~<td></tr>';
                    $("#table_search_user").append(tr);
                } else {
                    if ($('[data-id="' + data.id + '"]').length === 0) {
                        let sex = '';
                        if (data.sex == 0) {
                            sex = '男';
                        } else {
                            sex = '女';
                        }
                        let btn = '<a class="btn btn-primary button-size" href="{{@url("/outer/users/bind/cooperator?id=")}}'+data.id+'">绑定</a>';
                        let tr = '<tr><td data-id='+data.id+'>'+data.id+'</td><td>'+data.name+'</td><td>'+sex+'</td><td>'+data.email+'</td><td>'+data.phone+'</td><td>'+data.created_at+'</td><td>'+btn+'</td></tr>';
                        $("#table_search_user").append(tr);
                    }
                }
            }
        });
    });
});
</script>
@endsection