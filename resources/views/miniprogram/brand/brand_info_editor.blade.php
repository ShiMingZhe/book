@extends('miniprogram.template.main')
@section('content')
<!-- Main content -->
<section class="content">
    @foreach($errors as $error)
        <p style="color: red;">{{$error}}</p>
    @endforeach
    @if(!empty($brandInfo))
    <!-- form start -->
    <form role="form" action="{{@url("/outer/brand/editor")}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputFile">品牌logo</label>
                <input type="file" id="inputFile" name="image_field" value="">
            </div>
            <div class="form-group">
                <label for="brandName">品牌名称</label>
                <input type="text" class="form-control" id="brandName" placeholder="品牌名称" name="brandName" value="{{ $brandInfo[0]->name }}">
            </div>
            <div class="form-group">
                <label for="brandAddress">品牌地址</label>
                <input type="text" class="form-control" id="brandAddress" placeholder="品牌地址" name="brandAddress" value="{{ $brandInfo[0]->address }}">
            </div>
            <div class="form-group">
                <label for="brandIntroduce">品牌介绍</label>
                <input type="text" class="form-control" id="tinyMCEEditor" placeholder="品牌介绍" name="brandIntroduce" value="{{ $brandInfo[0]->introduce }}">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </form>
    @else
    <!-- form start -->
    <form role="form" action="{{@url("/outer/brand/create")}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label for="inputFile">品牌logo</label>
                <input type="file" id="inputFile" name="image_field" value="">
            </div>
            <div class="form-group">
                <label for="brandName">品牌名称</label>
                <input type="text" class="form-control" id="brandName" placeholder="品牌名称" name="brandName">
            </div>
            <div class="form-group">
                <label for="brandAddress">品牌地址</label>
                <input type="text" class="form-control" id="brandAddress" placeholder="品牌地址" name="brandAddress">
            </div>
            <div class="form-group">
                <label for="brandIntroduce">品牌介绍</label>
                <input type="text" class="form-control" id="tinyMCEEditor" placeholder="品牌介绍" name="brandIntroduce">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">创建品牌</button>
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