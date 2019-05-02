{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">查看诗词</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form">
            <div class="form-group">
                <label>标题</label>
                <div>{{$poetry->title}}</div>
            </div>

            <div class="form-group">
                <label>作者</label>
                <div>{{$poetry->author}}</div>
            </div>

            <div class="form-group">
                <label>唯一码</label>
                <div>{{$poetry->uniq_code}}</div>
            </div>

            <div class="form-group">
                <label>一句话简介</label>
                <div>{{$poetry->short_introduce}}</div>
            </div>

            <div class="form-group">
                <label>音频词内容</label>
                <div>{{$poetry->content}}</div>
            </div>

            <div class="form-group">
                <label>诗词内容</label>
                <div>{!! $poetry->sub_content !!}</div>
            </div>

            <div class="form-group">
                <label>详情</label>
                <div>{!! $poetry->detail !!}</div>
            </div>

            <div class="form-group">
                <label>MP3地址</label>
                <div>{{$poetry->mp3_url}}</div>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>
@endsection
