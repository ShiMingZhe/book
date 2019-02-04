@extends('miniprogram.template.main')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">知识付费详情</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form">
            <div class="form-group">
                <label>名称</label>
                <div>{{$knowledge->name}}</div>
            </div>

            <div class="form-group">
                <label>类别</label>
                <div>{{$knowledge->category}}</div>
            </div>

            <div class="form-group">
                <label>价格</label>
                <div>{{$knowledge->price}}</div>
            </div>

            <div class="form-group">
                <label>来源</label>
                <div>{{$knowledge->origin}}</div>
            </div>

            <div class="form-group">
                <label>内容</label>
                <div>{!! $knowledge->content !!}</div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
@endsection
