{{-- Extends Admin Panel --}}
@extends('layout.app')

@section('title')
Dashboard
@endsection

@section('open-dashboard')
nav-item menu-open
@endsection

{{-- Adds Dashboard Subtitle --}}
{{-- @section('subtitle')
<center style="margin-left:650px;background-color:blueviolet;width:fit-content;border-radius:20px;padding:10px;color:white;">Dashboard</center>
@endsection --}}

{{-- Adds Content --}}
@section('content')
<div class="container" style="margin-left: 230px">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('orders.new') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>New Orders</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('status',"Pending")->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('orders.accepted') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Accepted Orders</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('status',"Accepted")->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('orders.delivered') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Delivered Orders</h2>
                        <br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('status',"Delivered")->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
    </div>
    <br><br>
    <div class="row" style="margin-top: 20px">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('orders.returned') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Return Requests</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('status',"Return Requested")->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('orders.canceled') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Orders Canceled</h2>
                        <br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('status','Canceled')->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('feedbackAdmin') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Total Feedbacks</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('feedback')->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
    </div>
    <br><br>
    <div class="row" style="margin-top: 20px">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('category.index') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Total Categories</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('categories')->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('product.index') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Total Products</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('products')->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{ route('contactusAdmin') }}" style="color:black">
                <div style="background-color:aquamarine;width:300px;padding:30px;border-radius:15px;">
                    <center>
                        <h2>Total ContactUs</h2><br>
                        <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('contact')->count();}}
                        </h1><br>
                    </center>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
