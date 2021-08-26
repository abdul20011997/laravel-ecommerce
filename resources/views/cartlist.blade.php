<?php
$totalamount=0;
for($i=0;$i<count($data);$i++){
    $totalamount1=(int)$data[$i]->Quantity * (int)$data[$i]->price;
    $totalamount=$totalamount + $totalamount1;
}
?>
@extends('master')
@section('content')
<div style="margin:10px">
    <h1>Cart Items</h1>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Subtotal</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      
    @for($i=0;$i<count($data);$i++)
    <tr>
      <th scope="row">{{$i + 1 }}</th>
      <td>{{$data[$i]->name}}</td>
      <td><img src="{{$data[$i]->gallery}}" alt="{{$data[$i]->name}}" style="height:150px;"/></td>
      <td>{{$data[$i]->Quantity}}</td>
      <td>{{$data[$i]->price}}</td>
      <td>{{$data[$i]->price * $data[$i]->Quantity}}</td>
      <td><a href={{"/cartdelete/".$data[$i]->cartId}} class="btn btn-warning">Remove</a></td>
    </tr>
    @endfor
    <tr>
    <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td>Total</td>
      <td>{{$totalamount}}</td>
      <td><a href="/checkout" class="btn btn-success">Proceed to Checkout</a></td>
   </tr>
  </tbody>
</table>
<div>
<style>
.table td, .table th {
    padding: .75rem;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
    text-align:center;
}
</style>
@endsection