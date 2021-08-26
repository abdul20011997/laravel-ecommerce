@extends('master')
@section('content')
<div style="margin:10px">
<h1>Checkout</h1>
<table class="table">
  <tbody>
     <tr>
         <th scope="row">Amount</th>
         <td>₹{{$totalamount}}</td>
     </tr>
     <tr>
         <th scope="row">Tax</th>
         <td>₹0</td>
     </tr>
     <tr>
         <th scope="row">Delivery Charge</th>
         <td>₹10</td>
     </tr>
     <tr>
         <th scope="row">Total Amount</th>
         <td>₹{{$totalamount+10}}</td>
     </tr>
  </tbody>
</table>
<form action="/order" method="POST"> 
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <textarea class="form-control" aria-label="With textarea" name="address"></textarea>
  </div><br>
  <div class="form-check">
    <input type="radio" class="form-check-input" value="cod" id="Cash on delivery" name="paymenttype">
    <label class="form-check-label" for="Cash on delivery">Cash on Delivery</label>
  </div><br>
  <div class="form-check">
    <input type="radio" class="form-check-input" value="online" id="Online" name="paymenttype">
    <label class="form-check-label" for="Online" name="online">Pay Online</label>
  </div><br>

  <button type="submit" class="btn btn-primary">Place Order</button>
</form>
</div>
@endsection