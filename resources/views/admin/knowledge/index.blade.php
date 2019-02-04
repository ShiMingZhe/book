@extends('admin.template.layouts')
@section('content')
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">知识付费管理</h3>
                    <div class="box-tools">
                        <a type="button" href="{{@url("/outer/knowledge/create")}}" style="width: 100px;" class="btn btn-default">新增</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>编号ID</th>
                            <th>名称</th>
                            <th>类别</th>
                            <th>价格</th>
                            <th>来源</th>
                            <th>日期</th>
                            <th style="width: 150px;">操作</th>
                        </tr>
                        @foreach($knowledges as $knowledge)
                        <tr>
                            <td>{{ $knowledge->id }}</td>
                            <td>{{ $knowledge->name }}</td>
                            <td>{{ $knowledge->category }}</td>
                            <td>{{ $knowledge->price }}￥</td>
                            <td>{{ $knowledge->origin }}</td>
                            <td>{{ $knowledge->created_at }}</td>
                            <td>
                                <a type="button" class="btn btn-default button-size" href="{{@url("/outer/knowledge/find/detail/{$knowledge->id}")}}">查看</a>
                                <a type="button" class="btn btn-primary button-size" href="{{@url("/outer/knowledge/editor/{$knowledge->id}")}}">编辑</a>
                                <a type="button" class="btn btn-danger button-size" href="{{@url("/outer/users/setting/rule")}}">取消</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection