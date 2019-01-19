@extends('miniprogram.template.main')
@section('content')
<section>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">品牌协管员管理</h3>
                <div class="box-tools">
                    <a type="button" href="{{@url("/outer/users/create/cooperator")}}" style="width: 100px;" class="btn btn-default">新增协管员</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>性别</th>
                        <th>邮箱</th>
                        <th>手机号</th>
                        <th>所属品牌</th>
                        <th>注册日期</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>男</td>
                        <td>1639161005@qq.com</td>
                        <td>18160883137</td>
                        <td>北京木客文化科技有限公司</td>
                        <td>11-7-2014</td>
                        <td>
                            <a type="button" class="btn btn-primary button-size" href="{{@url("/outer/users/setting/rule")}}">设置权限</a>
                        </td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>男</td>
                        <td>1639161005@qq.com</td>
                        <td>18160883137</td>
                        <td>北京木客文化科技有限公司</td>
                        <td>11-7-2014</td>
                        <td>
                            <a type="button" class="btn btn-primary button-size">设置权限</a>
                        </td>
                    </tr>
                    <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>男</td>
                        <td>1639161005@qq.com</td>
                        <td>18160883137</td>
                        <td>北京木客文化科技有限公司</td>
                        <td>11-7-2014</td>
                        <td>
                            <a type="button" class="btn btn-primary button-size">设置权限</a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
</section>
<!-- /.content -->
@endsection