@extends('master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <img src={{$data['gallery']}} alt={{$data['name']}} class="product-img"/>
    </div>
    <div class="col-sm-6" style="margin-top:40px;">
        <h1>Product Name : {{$data['name']}}</h1>
        <h2>Price : {{$data['price']}}</h2>
        <h3>Category : {{$data['category']}}</h3>
        <form action='/addtocart' method='POST'>
            @csrf
            <input type="hidden" name="productid" value="{{$data['id']}}"/>
        <button class="btn btn-primary">Add to cart</button>
        </form>
        <button class="btn btn-success" style="margin-top: 10px;">Buy now</button>

    </div>
</div>
</div>

@endsection