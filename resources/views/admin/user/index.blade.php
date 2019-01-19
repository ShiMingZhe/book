{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box">
    <div class="box-header">
        <h3>管理员管理</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>邮箱</th>
                <th>手机</th>
                <th>头像</th>
                <th>昵称</th>
                <th>角色</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        @if($user->sex == '0')
                            <td>男</td>
                        @elseif($user->sex == '1')
                            <td>女</td>
                        @else
                            <td>未知</td>
                        @endif
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->headimgurl}}</td>
                        <td>{{$user->nickname}}</td>
                        <td>{{$user->role_name}}</td>
                        <td>
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default">
                                更改角色
                            </button>
                            <button type="button" class="btn btn-block btn-danger">删除</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">更改角色</h4>
                </div>
                @isset($user)
                <!-- radio -->
                <form role="form" class="form-group" action="{{@url("/user/admin/changeRole")}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="userId" value="{{$user->id}}">
                    <div class="modal-body">
                        @if($user->role_id == '2')
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="2" disabled>
                                    管理员
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="3">
                                    普通管理员
                                </label>
                            </div>
                        @elseif($user->role_id == '3')
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="2">
                                    管理员
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="3" disabled>
                                    普通管理员
                                </label>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">确定</button>
                    </div>
                </form>
                @endisset
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.box -->
@endsection
{{--
@include('admin.footer')--}}
