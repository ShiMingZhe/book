@extends('miniprogram.template.main')
@section('content')
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">产品列表</h3>
                    <div class="box-tools">
                        <a type="button" href="{{@url("/outer/brand/editor/productions")}}" style="width: 100px;" class="btn btn-default">新增产品</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>产品封面</th>
                            <th>产品名称</th>
                            <th>产品价格</th>
                            <th>产品规格说明</th>
                            <th>产品详情</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>古诗词深度学习</td>
                            <td>39.9￥</td>
                            <td>本</td>
                            <td>本</td>
                            <td>
                                <a type="button" class="btn btn-primary button-size">编辑</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Update software</td>
                            <td>古诗词深度学习</td>
                            <td>39.9￥</td>
                            <td>本</td>
                            <td>本</td>
                            <td>
                                <a type="button" class="btn btn-primary button-size">编辑</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Update software</td>
                            <td>古诗词深度学习</td>
                            <td>39.9￥</td>
                            <td>本</td>
                            <td>本</td>
                            <td>
                                <a type="button" class="btn btn-primary button-size">编辑</a>
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
@endsection