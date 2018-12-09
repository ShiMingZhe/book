@include('admin.header')
<table class="table table-bordered table-striped">
    @foreach($data as $key => $value)
        <tr><td>{{$key}}</td><td>http://music.mukeen.com/{{$value}}</td></tr>
    @endforeach
</table>
@include('admin.footer')