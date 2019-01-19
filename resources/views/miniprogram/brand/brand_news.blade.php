@extends('miniprogram.template.main')
@section('content')
<section>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">品牌动态</h3>
                <div class="box-tools">
                    <a type="button" href="{{@url("/outer/brand/news/editor")}}" style="width: 100px;" class="btn btn-default">新增</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>一句话简介</th>
                        <th>摘要</th>
                        <th>动态详情</th>
                        <th>封面地址</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td style="width: 130px;">
                            <a type="button" href="{{@url("/outer/brand/news/editor")}}" class="btn btn-primary button-size">编辑</a>
                            <a type="button" href="" class="btn btn-danger button-size">删除</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Update software</td>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td style="width: 130px;">
                            <a type="button" href="{{@url("/outer/brand/news/editor")}}" class="btn btn-primary button-size">编辑</a>
                            <a type="button" href="" class="btn btn-danger button-size">删除</a>
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