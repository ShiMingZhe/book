{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<div class="box">
    <div class="box-header">
        <h3>诗词音频列表</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-striped">
            @foreach($data as $key => $value)
                <tr><td>{{$key}}</td><td>http://music.mukeen.com/{{$value}}</td></tr>
            @endforeach
        </table>
    </div>
    <div class="box-footer">

    </div>
</div>

@endsection
{{--
@include('admin.footer')--}}
