@extends('layout')

@section('title')
    Home
@endsection

@section('home')
    active
@endsection

@section('style-link')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
   <!-- Slider -->
   <section class="slider_section">
        <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="{{ asset('images/banner1.jpg') }}" alt="First Slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>Latest<br> <strong class="black_bold">Tech</strong><br>
                                <strong class="yellow_bold">Gadgets</strong></h1>
                            <a href="{{ route('products') }}">See More Products</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('images/banner2.jpg') }}" alt="Second Slide" style="height: 590px; width: 1730px;">
                </div>

                {{-- <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('images/banner3.jpg') }}" alt="Third slide" style="height: 590px; width: 1730px;">
                </div> --}}

                <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('images/banner4.jpg') }}" alt="Third Slide" style="height: 590px; width: 1730px;">
                </div>

                <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('images/banner5.webp') }}" alt="Fourth Slide" style="height: 590px; width: 1730px;">
                </div>

                {{-- <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('images/banner6.jpg') }}" alt="Sixth slide" style="height: 590px; width: 1730px;">
                </div> --}}

                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('images/banner7.jpg') }}" alt="Fifth Slide" style="height: 590px; width: 1730px;">
                </div>

                <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('images/banner8.jpg') }}" alt="Sixth Slide" style="height: 590px; width: 1730px;">
                </div>
            </div>

            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
        </div>
   </section>

   <!-- Category -->
   <div>
      <div class="whyschose">
         <div class="container">
            <div class="row">
               <div class="col-md-7 offset-md-3">
                  <div class="title">
                     <h2><strong class="black">Categories</strong></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
               <div class="row">
                    @foreach($categories as $category)
                        <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <a href="{{ route('productSort',['id'=>$category->categoryId]) }}">
                                <div class="for_box">
                                    <i><img src="{{ asset('/categoryImage/'.$category->imagePath) }}" style="height: 100px;width:150px;object-fit:contain;"/></i>
                                    <h3>{{  $category->name }}</h3>
                                </div>
                            </a>
                        </dir>
                    @endforeach
                    <div class="col-md-12">
                        <a href="{{ route('categories') }}"><button class="read-more"> All Categories</button></a>
                        {{-- <input type="button" value="All Category" class="read-more"> --}}
                    </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Products -->
   <div>
      <div class="product">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2><strong class="black">Products</strong></h2>
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
                                <div class="product-box" style="border-radius:25px;">
                                    <i><img src="{{ asset('/productImage/'.$product->imagePath) }}" style="height: 130px;width:130px;object-fit:contain;"/></i>
                                    <h3>{{  $product->name }}</h3>
                                    <span>{{  $product->price }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        <a href="{{ route('products') }}"><button class="read-more"> All Products</button></a>
                    </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
