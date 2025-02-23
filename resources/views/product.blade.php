@extends('layout')

@section('title')
    Product
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
                         <h2>{{ $product->name }}</h2>
                      </div>
                   </div>
             </div>
          </div>
       </div>
    </div>

    <div>
        <div align="center">
            <br>
            <img src="{{ asset('/productImage/'.$product->imagePath) }}" style="height: 400px;width:400px;object-fit:contain;"/>
            <br><br>
            <h2> {{ $product->description }}</h2>
            <h1><b>₹ {{ $product->price }}</b></h1>
            {{-- <a><button class="buy" style="border-radius:25px;font-size:25px;">Buy Now</button></a><br><br> --}}
            <a href="{{ route('addtocart',['id'=>$product->productId]) }}"><button class="buy" style="border-radius:20px;font-size:22px;">Add To Cart</button></a><br>
            <a href="{{ route('addtowishlist',['id'=>$product->productId]) }}"><button class="buy" style="border-radius:20px;font-size:22px;background-color:cornflowerblue;"> Add To Wishlist</button></a>
            <br><br>
        </div>
    </div>
 </div>
@endsection
