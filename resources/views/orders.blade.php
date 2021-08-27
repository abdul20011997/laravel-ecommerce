@extends('master')
@section('content')
<div style="margin:10px">
    <h1>List of Orders</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Order Id</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @for($i=0;$i<count($orderdata);$i++)
        <tr>
        <th scope="row">{{$i+1}}</th>
        <td>{{$orderdata[$i]->id}}</td>
        <td>{{$orderdata[$i]->amount}}</td>
        <td>{{$orderdata[$i]->status}}</td>
        <td>{{$orderdata[$i]->paymentstatus}}</td>
        <td><a href={{"orderdetail/".$orderdata[$i]->id}} class="btn btn-primary">View details</a></td>
        </tr>
        @endfor
  </tbody>
</table>
</div>
@endsection