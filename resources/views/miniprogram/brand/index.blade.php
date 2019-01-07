@extends('miniprogram.template.main')
@section('content')
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">品牌介绍</a></li>
            <li><a href="#timeline" data-toggle="tab">品牌动态</a></li>
            <li><a href="#settings" data-toggle="tab">产品列表</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="activity">
                @include('miniprogram.brand.brand_info')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
                <a href="#" class="btn btn-primary">新增品牌动态</a>
                @include('miniprogram.brand.brand_news_add')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="settings">
                @include('miniprogram.brand.brand_productions')
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
@endsection