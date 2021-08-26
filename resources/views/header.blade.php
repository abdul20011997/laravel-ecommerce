<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user')){
  $total=ProductController::CartCount();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Orders</a>
      </li>
      
      <form class="form-inline my-2 my-lg-0" action="search" method="POST">
        @csrf
      <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search" style="width:500px">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </ul>
    @if(Session::has('user'))
    <a href="/cartlist"><span class="navbar-text">
      Cart({{$total}})
    </span></a>
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{Session::get('user')['name']}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/logout">Logout</a>
         
        </div>
    </li>
    @else
    <li class="nav-item" style="list-style-type: none;">
        <a class="nav-link" href="/login">Login</a>
    </li>
    @endif

   
  </div>
</nav>