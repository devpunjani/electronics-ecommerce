@extends('layout')

@section('title')
    Cart
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
                         <h2>Cart</h2>

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
            @php
                $total = 0;
            @endphp
              @foreach ($products as $item)
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                      <a href="{{ route('product',['id'=>$item->productId]   ) }}">
                          <div class="product-box" style="width:auto;height:auto;border-radius:25px;">
                              <i><img src="{{ asset('/productImage/'. $item->product->imagePath) }}" style="height: 130px;width:130px;object-fit:contain;"/></i>
                              <h3>{{  $item->product->name }}</h3>
                              <span>{{  $item->product->price }}</span><br>
                              @php
                                $total += $item->product->price;
                              @endphp
                              <a href="{{ route('cartdestroy',['id'=>$item->cartId]) }}"><button class="buy" style="border-radius:20px;font-size:18px;background-color:orangered;" >Delete</button></a><br>
                              {{-- <a href="#"><button class="btn btn-info">Add To Cart</button></a><br><br> --}}
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
        <a href="{{ route('buynow') }}"><button class="buy" style="font-size: 20px;margin:20px;" onclick="return confirm('Do You Want To Buy All Products From Cart?');">Buy Now</button></a>
        &nbsp;&nbsp;
        <a href="{{ route('clearcart') }}"><button class="buy" style="font-size:20px;background-color:orangered;" onclick="return confirm('Do You Want To Clear The Cart ?');">Clear All</button></a>
        <br>
        <div class="buy" style="border-radius:15px;font-size:20px;background-color:darkorchid;">
            <h2 style="color:white;padding-top:13px;"> Total Price : {{ $total }}</h2>
        </div>
    </center>
    <br>
 </div>
@endsection
