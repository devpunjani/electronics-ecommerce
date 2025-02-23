@extends('layout')

@section('title')
    Orders
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
                         <h2>Orders</h2>
                      </div>
                   </div>
             </div>
          </div>
       </div>
    </div>

    {{-- <div class="product-bg">
       <div class="product-bg-white">
          <div class="container">
             <div class="row">

             </div>
          </div>
       </div>
    </div> --}}
    <table class="table table-bordered" id="example1">
        <thead>
            <tr>
                <th style="width: px">Order Id</th>
                <th style="width: px">Name</th>
                <th style="width: px">Image</th>
                <th>Order Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order )
                <tr>
                    <td>{{ $order->orderId }}</td>
                    <th>{{ $order->products->name }}</th>
                    <td>
                        <center>
                            <img src="{{ asset('/productImage/'.$order->products->imagePath) }}" style="height:150px;width:150px;"/>
                        </center>
                    </td>
                    <td>{{ $order->orderDate }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <center>
                            <div>
                                @if($order->status == "Delivered" || $order->status == "Return Rejected")
                                    <a href="{{ route('downloadPdf',['id'=>$order->orderId]) }}" class="buy" style="font-size:16px;">Download Invoice</a><br>
                                    <a href="{{ route('returnorder',['id'=>$order->orderId]) }}" onclick="return confirm('Are You Sure You Want To Return This Order ?');" class="buy" style="font-size:16px;background-color:cornflowerblue;">Return Order</a>
                                @elseif($order->status == "Return Requested")
                                    <a href="{{ route('downloadPdf',['id'=>$order->orderId]) }}" class="buy" style="font-size:16px;">Download Invoice</a><br>
                                @elseif($order->status == "Pending" || $order->status == "Accepted" )
                                    <a href="{{ route('cancelorder',['id'=>$order->orderId]) }}" onclick="return confirm('Are You Sure You Want To Cancel This Order ?');" class="buy" style="font-size:16px;background-color:orangered;">Cancel Order</a>
                                @else
                                @endif
                            </div>
                        </center>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection
