@extends('layout')

@section('title')
    Categories
@endsection

@section('categories')
    active
@endsection

@section('style-link')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
   <!-- Categories -->
   <div>
        <div>
            <div class="brand_color">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titlepage">
                                <h2>Categories</h2>
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
                        @foreach ($categories as $category )
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                <a href="{{ route('productSort',['id'=>$category->categoryId]) }}">
                                    <div class="product-box" style="border-radius:25px">
                                        <i><img src="{{ asset('/categoryImage/'.$category->imagePath) }}" style="height: 120px;width:160px;object-fit:contain;"/></i>
                                        <h3>{{  $category->name }}</h3>
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
