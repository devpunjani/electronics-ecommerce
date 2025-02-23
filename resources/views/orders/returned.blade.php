@extends('layout.app')

@section('subtitle')
Return Requests
@endsection

@section('title')
Returned Orders
@endsection

@section('open-main-order')
nav-item menu-open
@endsection

@section('open-returned')
nav-link active
@endsection

@section('content')

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th> Sr. No.</th>
            <th> Order Id</th>
            <th> Name </th>
            <th> Product Name</th>
            <th> Order Date</th>
            <th style="width:150px;"> Address</th>
            <th> Amount</th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1; ?>
        @foreach ($orders as $order )
            <tr>
                <td> {{  $count++ }}</td>
                <td> {{  $order->orderId }}</td>
                <td> {{ $username = DB::table('users')->where('id',$order->userId)->value('name'); }}</td>
                <td> {{ $productName = DB::table('products')->where('productId',$order->productId)->value('name'); }}</td>
                <td> {{ $order->orderDate }}</td>
                <td> {{ $order->address }}</td>
                <td> {{ $order->amount }}</td>
                <td>
                    <center>
                    <a href="{{ route('orders.returnaccept',['id'=>$order->orderId]) }}" class="btn btn-success btn-sm" style="font-size:18px"><i class="fas fa-edit"> Accept</i></a>
                    <br>
                    <br>
                    <a href="{{ route('orders.returnreject',['id'=>$order->orderId]) }}" onclick="return confirm('Are You Sure You Want To Reject This Return Request ?');" class="btn btn-danger btn-sm" style="font-size:18px"><i class="fas fa-trash"> Reject</i></a>
                    </center>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
