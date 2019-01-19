@extends('miniprogram.template.main')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">设置权限</h3>
                    </div>
                    <div class="box-body">
                        <!-- Minimal style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="minimal">
                            </label>
                            <label>
                                <input type="checkbox" class="minimal" disabled>
                                Minimal skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r1" class="minimal" checked>
                            </label>
                            <label>
                                <input type="radio" name="r1" class="minimal">
                            </label>
                            <label>
                                <input type="radio" name="r1" class="minimal" disabled>
                                Minimal skin radio
                            </label>
                        </div>

                        <!-- Minimal red style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal-red" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="minimal-red">
                            </label>
                            <label>
                                <input type="checkbox" class="minimal-red" disabled>
                                Minimal red skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r2" class="minimal-red" checked>
                            </label>
                            <label>
                                <input type="radio" name="r2" class="minimal-red">
                            </label>
                            <label>
                                <input type="radio" name="r2" class="minimal-red" disabled>
                                Minimal red skin radio
                            </label>
                        </div>

                        <!-- Minimal red style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="flat-red" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red">
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red" disabled>
                                Flat green skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r3" class="flat-red" checked>
                            </label>
                            <label>
                                <input type="radio" name="r3" class="flat-red">
                            </label>
                            <label>
                                <input type="radio" name="r3" class="flat-red" disabled>
                                Flat green skin radio
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        北京木客文化科技有限公司
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection