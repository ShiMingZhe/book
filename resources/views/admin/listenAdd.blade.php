@include('admin.header')
<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">新增诗词</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="" method="post">
            {{csrf_field()}}
            <!-- text input -->
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label>作者</label>
                <input type="text" class="form-control" name="author">
            </div>

            <div class="form-group">
                <label>一句话简介</label>
                <input type="text" class="form-control" name="short_introduce">
            </div>

            <div class="form-group">
                <label>音频词内容</label><br>
                <textarea name="content" rows="10" cols="100" style="width: 100%;"></textarea>
            </div>

            <div class="form-group">
                <label>诗词内容</label><br>
                <textarea id="editor1" name="sub_content" rows="10" cols="100" style="width: 100%;"></textarea>
            </div>

            <div class="form-group">
                <label>详情</label>
                <textarea id="editor1" name="detail" rows="10" cols="80"></textarea>
            </div>

            <div class="form-group">
                <label>MP3地址</label>
                <input type="text" class="form-control" name="mp3_url">
            </div>

            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
    <!-- /.box-body -->
</div>

<!-- /.box -->
<!-- jQuery 3 -->
<script src="{{@asset("admin-lte/bower_components/jquery/dist/jquery.min.js")}}"></script>
<script src="{{@asset("/admin-lte/bower_components/ckeditor/ckeditor.js")}}"></script>
<script>
    $(function () {
        CKEDITOR.replace('editor1')
    })
</script>
@include('admin.footer')