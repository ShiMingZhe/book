{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box">
    <div class="box-header">
        <h4>该页面共做<span style="color: red;font-size: xx-large">{{$total}}</span>个任务，
            通过率:<span style="color: red;font-size: xx-large">{{$pass}}</span>，
            失败率:<span style="color: red;font-size: xx-large">{{$reject}}</span>
        </h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>任务名称</th>
                <th>任务来源</th>
                <th>审核状态</th>
                <th>拒绝原因</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $taskItem)
                <tr>
                    <td>{{$taskItem->id}}</td>
                    <td>{{$taskItem->name}}</td>
                    <td>{{$taskItem->describe}}</td>
                    @if($taskItem->is_pass == '0')
                        <td>待审核</td>
                    @elseif($taskItem->is_pass == '1')
                        <td>审核通过</td>
                    @elseif($taskItem->is_pass == '2')
                        <td>审核拒绝</td>
                    @endif
                    <td>{{$taskItem->reason}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            {{ $tasks->links() }}
        </ul>
    </div>
</div>
<!-- /.box -->
@endsection
{{--
@include('admin.footer')--}}
