@extends('master')
@section('content')
<!-- <div class="container custom-product"> -->
    <!-- <div class="row"> -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

    </ol>
    <div class="carousel-inner">
      
        @for($i=0;$i<count($data);$i++)
        <div class="carousel-item {{$data[$i]['id']===1 ? 'active' : ''}}">
        <a href={{"productdetail/".$data[$i]['id']}}>

            <img class="d-block w-100" src="{{$data[$i]['gallery']}}" alt="{{$data[$i]['name']}}" style="height:500px;">
            <div class="carousel-caption d-none d-md-block carousel-text-bg">
                <h5>{{$data[$i]['name']}}</h5>
                <p>{{$data[$i]['description']}}</p>
            </div>
        </a>

        </div>
        @endfor
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div>
    <h1 class="trending-heading">Trending Products</h1>
    <div>
        @for($i=0;$i<count($data);$i++)
        <a href={{"productdetail/".$data[$i]['id']}}>
        <div class="trending-wrapper">
            <img src="{{$data[$i]['gallery']}}" alt="{{$data[$i]['name']}}" class="trending-image"/>
            <div class="trending-title">{{$data[$i]['name']}}</div>
        </div>
        </a>
        @endfor
    </div>
</div>
    <!-- </div> -->
<!-- </div> -->
@endsection