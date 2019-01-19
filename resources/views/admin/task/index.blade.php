{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box">
    <div class="box-header">
        <h3>待处理任务-共<span style="color: red;">{{count($data)}}</span>条任务</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>任务名称</th>
                <th>操作人员</th>
                <th>任务来源</th>
                <th>审核状态</th>
                <th>操作</th>
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
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            {{$data->links()}}
        </ul>
    </div>
</div>
<!-- /.box -->
@endsection
