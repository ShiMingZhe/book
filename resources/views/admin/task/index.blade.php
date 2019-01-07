{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box">
    <div class="box-header">
        <h3>待处理任务-共<span style="color: red;">{{count($data)}}</span>条任务</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <td>id</td>
                <td>任务名称</td>
                <td>操作人员</td>
                <td>任务来源</td>
                <td>审核状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $taskItem)
                @if($taskItem->is_pass == '0')
                    <tr>
                        <td>{{$taskItem->id}}</td>
                        <td>{{$taskItem->name}}</td>
                        <td>{{$taskItem->operator}}</td>
                        <td>{{$taskItem->describe}}</td>
                        @if($taskItem->is_pass == '0')
                            <td>待审核</td>
                        @elseif($taskItem->is_pass == '1')
                            <td>审核通过</td>
                        @elseif($taskItem->is_pass == '2')
                            <td>审核拒绝</td>
                        @endif
                        <td>
                            <a href="{{@url("/task/admin/pass/{$taskItem->id}/{$taskItem->task_id}/{$taskItem->type}")}}">
                                <button type="button" class="btn btn-block btn-primary">通过</button>
                            </a>
                            <a href="{{@url("/task/admin/reject/{$taskItem->id}/{$taskItem->task_id}/{$taskItem->type}")}}">
                                <button type="button" class="btn btn-block btn-danger">拒绝</button>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
{{--
@include('admin.footer')--}}
