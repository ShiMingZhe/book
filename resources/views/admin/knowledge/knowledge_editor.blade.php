@extends('admin.template.layouts')
@section('content')
 <!-- Main content -->
<section class="content">
    @if(!empty($knowledge))
        <!-- form start -->
        <form role="form" action="{{@url("/outer/knowledge/update")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <input type="hidden" name="id" value="{{ $knowledge->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="名称" value="{{ $knowledge->name }}">
                </div>
                <div class="form-group">
                    <label>类别</label>
                    <select class="form-control" name="category">
                        <option value="1">免费</option>
                        <option value="2">人气</option>
                        <option value="3">精选</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="价格" value="{{ $knowledge->price }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">内容</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="content" placeholder="内容" value="{{ $knowledge->content }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">来源</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="origin" placeholder="来源" value="{{ $knowledge->origin }}">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    @else
        <!-- form start -->
        <form role="form" action="{{@url("/outer/knowledge/create")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="名称">
                </div>
                <div class="form-group">
                    <label>类别</label>
                    <select class="form-control" name="category">
                        <option value="1">免费</option>
                        <option value="2">人气</option>
                        <option value="3">精选</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="价格">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">内容</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="content" placeholder="内容">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">来源</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="origin" placeholder="来源">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">发布知识付费项目</button>
            </div>
        </form>
    @endif

</section>
 <script src="{{@asset("tinymce/tinymce.min.js")}}"></script>
 <script>
     tinyMCE.init({
         selector: '#tinyMCEEditor'
     });
 </script>
@endsection