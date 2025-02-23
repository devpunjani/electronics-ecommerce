@extends('layout')

@section('title')
    Products
@endsection

@section('products')
    active
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
                           <h2>Products</h2>
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
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('product',['id'=>$product->productId]) }}">
                            <div class="product-box" style="width:230px;height:250px;border-radius:25px;">
                                <i><img src="{{ asset('/productImage/'.$product->imagePath) }}" style="height: 130px;width:130px;object-fit:contain;"/></i>
                                <h3>{{  $product->name }}</h3>
                                <span>{{  $product->price }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
