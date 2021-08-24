@extends('master')
@section('content')
<div style="width: 50%;margin: auto;">
@for($i=0;$i<count($data);$i++)
    <a href="productdetail/{{$data[$i]['id']}}">
    <div style="text-align: center;margin: 10px;">
    <img src="{{$data[$i]['gallery']}}" style="height: 300px;"/>
    <div>{{$data[$i]['name']}}</div>
   </div>
   </a>
    @endfor
</div>
@endsection