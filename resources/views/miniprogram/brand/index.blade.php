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
                <img class="profile-user-img img-responsive img-circle" src="{{ $brandInfo[0]->logo_url }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $brandInfo[0]->name }}</h3>

                <p class="text-muted text-center"><i class="fa fa-map-marker"></i>&nbsp;{{ $brandInfo[0]->address }}</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-solid">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <dl>
                                    {!! $brandInfo[0]->introduce !!}
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
        <a type="button" href="{{@url("/outer/brand/editor")}}" class="btn btn-primary">编辑品牌</a>
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