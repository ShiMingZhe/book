@extends('miniprogram.template.main')
@section('content')
<!-- Main content -->
<section>
    @if(!empty($product))
        <!-- form start -->
        <form role="form" action="{{@url("/outer/brand/productions/save")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">产品条码</label>
                    <input type="text" class="form-control" id="exampleInputFile" name="barCode" placeholder="产品条码" value="{{ $product->bar_code }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="productName" placeholder="产品名称" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="产品价格" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品规格说明</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="spec" placeholder="产品规格说明" value="{{ $product->spec }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品详情</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="detail" placeholder="产品详情" value="{{ $product->detail }}">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </form>
    @else
        <!-- form start -->
        <form role="form" action="{{@url("/outer/brand/productions/create")}}" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">产品条码</label>
                    <input type="text" class="form-control" id="exampleInputFile" name="barCode" placeholder="产品条码">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品名称</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="productName" placeholder="产品名称">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品价格</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="产品价格">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品规格说明</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="spec" placeholder="产品规格说明">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">产品详情</label>
                    <input type="text" class="form-control" id="tinyMCEEditor" name="detail" placeholder="产品详情">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">新增产品</button>
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