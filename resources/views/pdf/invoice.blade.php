@foreach ($order as $detail)

@endforeach
    <br/>
    <center>
        <h1>Invoice</h1>
    </center>
    <h3>Sold By: Lighten Online Shop</h3>
    <br>
    <hr>
    <br>
    <h4>Order Id : {{ $detail->orderId }}</h4>
    <h4>Order Date : {{ $detail->orderDate }}</h4>
    <h4>Customer Name : {{ DB::table('users')->where('id',$detail->userId)->value('name'); }}</h4>
    <h4>Contact Number : {{ DB::table('users')->where('id',$detail->userId)->value('phone'); }}</h4>
    <h4>Address : </h4>
    <div style="height:100px;width:200px;fit-content:fill;">
        {{ $detail->address }}
        </div>
    <hr>
    <table class="table table-bordered" id="example1">
        <thead>
            <th>Name</th>
            <th style="padding-left:50px;">Amount</th>
        </thead>
            <tbody>
                <td><center>{{ DB::table('products')->where('productId',$detail->productId)->value('name'); }}</center></td>
                <td style="padding-left:50px;"><center>{{ $detail->amount }}</center></td>
            </tbody>
    </table>
