@extends('master')
@section('content')
<div style="margin:10px">
    <h1>Order Details</h1>
    <div class="col-sm-3">Order Id : {{$totaldata[0]->order_id}} </div>
    <div class="col-sm-3">Address  : {{$totaldata[0]->address}}</div>
    <div class="col-sm-3">Status  : {{$totaldata[0]->status}}</div>
    <div class="col-sm-3">Payment Type  : {{$totaldata[0]->paymenttype}}</div>
    <div class="col-sm-3">Payment Status  : {{$totaldata[0]->paymentstatus}}</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Product Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Sub Total</th>
    </tr>
  </thead>
  <tbody>
      @for($i=0;$i<count($totaldata);$i++)
        <tr>
        <th scope="row">{{$i+1}}</th>
        <td>{{$totaldata[$i]->product_id}}</td>
        <td>{{$totaldata[$i]->name}}</td>
        <td>{{$totaldata[$i]->quantity}}</td>
        <td>{{$totaldata[$i]->price}}</td>
        <td>{{$totaldata[$i]->price * $totaldata[$i]->quantity}}</td>
        </tr>
        @endfor
        <tr>
        <th scope="row"></th>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Amount</td>
        <td>{{$totaldata[0]->amount}}</td>
        </tr>
  </tbody>
</table>
</div>
@endsection