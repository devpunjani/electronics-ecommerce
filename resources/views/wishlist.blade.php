@extends('layout')

@section('title')
    Wishlist
@endsection

@section('style-link')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <!-- Products -->
   <div>
    <div>
       <div class="brand_color">
          <div class="container">
             <div class="row">
                   <div class="col-md-12">
                      <div class="titlepage">
                         <h2>Wishlist</h2>
                      </div>
                   </div>
             </div>
          </div>
       </div>
    </div>

    <div class="product-bg">
       <div class="product-bg-white">
          <div class="container">
             <div class="row">
              @foreach ($products as $item)
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                      <a href="{{ route('product',['id'=>$item->productId]   ) }}">
                          <div class="product-box" style="width:auto;height:auto;border-radius:25px;">
                              <i><img src="{{ asset('/productImage/'. $item->product->imagePath) }}" style="height: 130px;width:130px;object-fit:contain;"/></i>
                              <h3>{{  $item->product->name }}</h3>
                              <span>{{  $item->product->price }}</span><br>
                              <a href="{{ route('wishlistdestroy',['id'=>$item->wishlistId]) }}"><button class="buy" style="border-radius:20px;font-size:18px;background-color:orangered;">Delete</button></a><br>
                              <a href="{{ route('addtocart',['id'=>$item->productId]) }}"><button class="buy" style="border-radius:20px;font-size:18px;background-color:cornflowerblue;">Add To Cart</button></a><br>
                              {{-- <a href="#"><button class="btn btn-success">Buy Now</button></a> --}}
                          </div>
                      </a>
                  </div>
              @endforeach
             </div>
          </div>
       </div>
    </div>
    <br>
    <center>
        <a href="{{ route('addalltocart') }}"><button class="buy" style="font-size: 20px;margin:20px;" >Add All To Cart</button></a>
        &nbsp;&nbsp;
        <a href="{{ route('clearwishlist') }}"><button class="buy" style="font-size:20px;background-color:orangered;" onclick="return confirm('Do You Want To Clear The Wishlist ?');">Clear All</button></a>
        <br>
    </center>
 </div>
@endsection
