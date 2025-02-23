@extends('layout.app')

@section('subtitle')
Delivered Orders
@endsection


@section('title')
Delivered Orders
@endsection

@section('open-main-order')
nav-item menu-open
@endsection

@section('open-delivered')
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
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
