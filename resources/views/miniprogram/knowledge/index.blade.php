@extends('miniprogram.template.main')
@section('content')
<section>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">知识付费管理</h3>
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
                        <tr>
                            <td>183</td>
                            <td>三国演义</td>
                            <td>免费</td>
                            <td>0￥</td>
                            <td>自营</td>
                            <td>11-7-2014</td>
                            <td>
                                <a type="button" class="btn btn-default button-size" href="{{@url("/outer/users/setting/rule")}}">查看</a>
                                <a type="button" class="btn btn-primary button-size" href="{{@url("/outer/users/setting/rule")}}">代理</a>
                                <a type="button" class="btn btn-danger button-size" href="{{@url("/outer/users/setting/rule")}}">取消</a>
                            </td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>红楼梦</td>
                            <td>精选</td>
                            <td>100.00￥</td>
                            <td>自营</td>
                            <td>11-7-2014</td>
                            <td>
                                <a type="button" class="btn btn-default button-size" href="{{@url("/outer/users/setting/rule")}}">查看</a>
                                <a type="button" class="btn btn-primary button-size" href="{{@url("/outer/users/setting/rule")}}">代理</a>
                                <a type="button" class="btn btn-danger button-size" href="{{@url("/outer/users/setting/rule")}}">取消</a>
                            </td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>西游记</td>
                            <td>人气</td>
                            <td>99.90￥</td>
                            <td>自营</td>
                            <td>11-7-2014</td>
                            <td>
                                <a type="button" class="btn btn-default button-size" href="{{@url("/outer/users/setting/rule")}}">查看</a>
                                <a type="button" class="btn btn-primary button-size" href="{{@url("/outer/users/setting/rule")}}">代理</a>
                                <a type="button" class="btn btn-danger button-size" href="{{@url("/outer/users/setting/rule")}}">取消</a>
                            </td>
                        </tr>
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