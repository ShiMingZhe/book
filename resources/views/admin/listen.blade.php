@extends('admin.template.layouts')
@section('content')
<style>
    table{
        width:100px;
        table-layout:fixed;/* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
    }
    td{
        width:100%;
        word-break:keep-all;/* 不换行 */
        white-space:nowrap;/* 不换行 */
        overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
        text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用*/
    }
</style>
<div class="box">
    <div class="box-header">
        <a href="/listenAdd">
            <button type="button" class="btn btn-default ">新增诗词</button>
        </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <td>id</td>
                <td>标题</td>
                <td>作者</td>
                <td>一句话简介</td>
                <td>音频词内容</td>
                <td>诗词内容</td>
                <td>详情</td>
                <td>MP3地址</td>
                <td>唯一码</td>
                <td>二维码</td>
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
                        <td>{{$poetry->short_introduce}}</td>
                        <td>{{$poetry->content}}</td>
                        <td>{{$poetry->sub_content}}</td>
                        <td>{{$poetry->detail}}</td>
                        <td>{{$poetry->mp3_url}}</td>
                        <td>{{$poetry->uniq_code}}</td>
                        <td align="center">
                            @if($poetry->qr_url)
                                <img width="60px" height="60px" src="{{@asset("qrcode/".$poetry->uniq_code.".png")}}">
                                <a href="{{@url("/downloadQr/$poetry->uniq_code/$poetry->title")}}" download="download"
                                   style="font-size: 16px;color: #c2574a;">下载</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{@url("/listen/editor/$poetry->id")}}">
                                <button type="button" class="btn btn-block btn-primary button-size">编辑</button>
                            </a>
                            <button type="button" class="btn btn-block btn-danger button-size">删除</button>
                            @if(empty($poetry->uniq_code))
                                <a href="{{@url("/listen/uniqid/$poetry->id")}}">
                                    <button type="button" class="btn btn-block btn-success button-size">生成唯一码</button>
                                </a>

                            @else
                                <a href="{{@url("/listen/uniqid/$poetry->id")}}">
                                    <button type="button" class="btn btn-block btn-success button-size" disabled>生成唯一码</button>
                                </a>
                                @if(!$poetry->qr_url)
                                    <a href="{{@url("/createQr/$poetry->uniq_code")}}">
                                        <button type="button" class="btn btn-block btn-default button-size">生成二维码</button>
                                    </a>
                                @else
                                    <a href="{{@url("/createQr/$poetry->uniq_code")}}">
                                        <button type="button" class="btn btn-block btn-default button-size" disabled>生成二维码</button>
                                    </a>
                                @endif
                            @endif

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
            {{$poetries->links()}}
        </ul>
    </div>
</div>
<!-- /.box -->
@endsection
