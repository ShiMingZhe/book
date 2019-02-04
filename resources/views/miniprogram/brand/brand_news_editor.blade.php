@extends('miniprogram.template.main')
@section('content')
 <!-- Main content -->
<section class="content">
    @if(!empty($new))
        <!-- form start -->
        <form role="form" action="{{@url("/outer/brand/news/save")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <input type="hidden" name="newId" value="{{ $new->id }}">
                <div class="form-group">
                    <label for="exampleInputFile">品牌动态封面</label>
                    <input type="file" id="exampleInputFile" name="image_field">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">一句话简介</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="BrandShortIntroduce" placeholder="一句话简介" value="{{ $new->short_introduce }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">摘要</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="BrandAbstract" placeholder="摘要" value="{{ $new->abstract }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">动态详情</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="BrandDetail" placeholder="动态详情" value="{{ $new->detail }}">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    @else
        <!-- form start -->
        <form role="form" action="{{@url("/outer/brand/news/storage")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputFile">品牌动态封面</label>
                    <input type="file" id="exampleInputFile" name="image_field">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">一句话简介</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="BrandShortIntroduce" placeholder="一句话简介">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">摘要</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="BrandAbstract" placeholder="摘要">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">动态详情</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="BrandDetail" placeholder="动态详情">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">发布品牌动态</button>
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