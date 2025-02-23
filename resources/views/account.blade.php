@extends('layout')

@section('title')
    Account
@endsection

@section('signin')
    active
@endsection

@section('style-link')
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
@endsection

@section('content')
<div>
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div align="left" style="width:fit-content;margin-left:60px;background-color:bisque;border-radius:20px;">
            <div align="center" style="padding:40px;">
            @if($account->photourl == null)
                <img src="{{ asset('/images/registerimage.jpg') }}" style="height: 180px;width:200px;border-radius:50%;"/><br><br>
            @else
                <img src="{{ asset('/userImage/'.$account->photourl) }}" style="height: 180px;width:200px;border-radius:50%;"/><br><br>
            @endif
                {{-- <img src="{{ asset('/userImage/'.$account->photourl) }}" style="height: 220px;width:250px;border-radius:50%;"/><br><br> --}}
                <h2 style="font-size: 30px"><b>{{ $account->name}}</b></h2>
                <h2 style="font-size: 30px">{{ $account->email}}</h2>
                <h2 style="font-size: 30px">{{ $account->phone}}</h2>
                <a href="{{ route('editaccount') }}"><button class="buy" style="font-size:15px;border-radius:15px;">Edit Account</button></a><br>
                <a href="{{ route('deleteaccount') }}" onclick="return confirm('Do You Want To Delete Your Account ?');"><button class="buy" style="font-size:15px;border-radius:15px;" >Delete Account</button></a><br>
                <a href="{{ route('changepassword') }}"><button class="buy" style="font-size:15px;border-radius:15px;">Change Password</button></a>
            </div>
        </div>

        <div class="container" align="right" style="margin-left: 160px">
            <div class="row">
                <div align="left" class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div style="background-color:bisque;width:300px;padding:30px;border-radius:15px;">
                        <center>
                            <i><img src="{{ asset('/images/cart.png') }}" style="height: 100px;width:100px;object-fit:contain;"/></i><br><br>
                            <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                                {{ DB::table('cart')->where('userId',Auth::user()->id)->count() }}
                            </h1><br>
                            <a href="{{ route('cart') }}"><button class="buy" style="border-radius:15px;font-size:20px;background-color:cornflowerblue;">View</button></a>
                        </center>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div align="center" class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div style="background-color:bisque;width:300px;padding:30px;border-radius:15px;">
                        <center>
                            <i><img src="{{ asset('/images/order.png') }}" style="height: 100px;width:100px;object-fit:contain;"/></i><br><br>
                            <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                            {{ DB::table('orders')->where('userId',Auth::user()->id)->count() }}
                            </h1><br>
                            <a href="{{ route('orders') }}"><button class="buy" style="border-radius:15px;font-size:20px;background-color:cornflowerblue;">View</button></a>
                        </center>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div align="right" class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div style="background-color:bisque;width:300px;padding:30px;border-radius:15px;">
                        <center>
                            <i><img src="{{ asset('/images/wishlist.png') }}" style="height: 100px;width:100px;object-fit:contain;"/></i><br><br>
                            <h1 style="background-color:white;width:100px;height:fit-content;border-radius:150px;padding:10px;">
                                {{ DB::table('wishlist')->where('userId',Auth::user()->id)->count() }}
                            </h1><br>
                            <a href="{{ route('wishlist') }}"><button class="buy" style="border-radius:15px;font-size:20px;background-color:cornflowerblue;">View</button></a>
                        </center>
                    </div>
                </div>
            </div>

            <br><br>

            <div align="left" style="background-color:bisque;width:980px;padding:30px;border-radius:15px;margin-right:300px;">
                <h1 style="font-size: 30px"><u>Address</u></h1>

                <h2 style="font-size: 25px;fit-content:fill;">{{ $account->address}}</h2>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
