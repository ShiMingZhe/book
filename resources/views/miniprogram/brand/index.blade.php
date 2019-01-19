@extends('miniprogram.template.main')
@section('content')
<section>
<!-- Post -->
<div class="post">
    @if(!empty($brandInfo))
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <!-- Profile Image -->
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{@asset('/admin-lte/dist/img/user4-128x128.jpg')}}" alt="User profile picture">

                <h3 class="profile-username text-center">北京木客文化科技有限公司</h3>

                <p class="text-muted text-center"><i class="fa fa-map-marker"></i>&nbsp;北京市丰台区</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl>
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.row -->
    <!-- /.content -->
    <div class="box-footer">
        <a type="button" href="{{@url("/outer/brand/editor")}}" class="btn btn-default">编辑品牌介绍</a>
    </div>
    @else
        <section class="content">
            <div class="callout callout-info">
                <h4>品牌创建</h4>

                <p>您还没有创建任何品牌，赶快创建一个吧~</p>
            </div>
            <div class="box-footer">
                <a type="button" href="{{@url("/outer/brand/editor")}}" class="btn btn-default">创建品牌</a>
            </div>
        </section>
    @endif
</div>
<!-- /.post -->
</section>
@endsection