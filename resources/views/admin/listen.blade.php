@include('admin.header')
<div class="box">
    <div class="box-header">
        <a href="/listenAdd">
            <button type="button" class="btn btn-default ">新增诗词</button>
        </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <td>id</td>
                <td>标题</td>
                <td>作者</td>
                <td>内容</td>
                <td>MP3地址</td>
                <td>唯一码</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>

            @foreach($poetries as $poetry)
                @if($poetry->is_available == '1')
                    <tr>
                        <td>{{$poetry->id}}</td>
                        <td>{{$poetry->title}}</td>
                        <td>{{$poetry->author}}</td>
                        <td>{{$poetry->content}}</td>
                        <td>{{$poetry->mp3_url}}</td>
                        <td>{{$poetry->uniq_id}}</td>
                        <td>
                            <a href="{{@url("/listen/editor/$poetry->id")}}">
                                <button type="button" class="btn btn-block btn-primary">编辑</button>
                            </a>
                            <button type="button" class="btn btn-block btn-danger">删除</button>
                            @if(empty($poetry->uniq_id))
                                <a href="{{@url("/listen/uniqid/$poetry->id")}}">
                                    <button type="button" class="btn btn-block btn-success">生成唯一码</button>
                                </a>
                            @else
                                <a href="{{@url("/listen/uniqid/$poetry->id")}}">
                                    <button type="button" class="btn btn-block btn-success" disabled>生成唯一码</button>
                                </a>
                            @endif
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
@include('admin.footer')