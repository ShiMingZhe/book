{{--@include('admin.header')--}}
@extends('admin.template.layouts')
@section('content')
<table class="table table-bordered table-striped">
    @foreach($data as $key => $value)
        <tr><td>{{$key}}</td><td>http://music.mukeen.com/{{$value}}</td></tr>
    @endforeach
</table>
@endsection
{{--
@include('admin.footer')--}}
