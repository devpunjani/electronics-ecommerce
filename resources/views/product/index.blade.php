@extends('layout.app')

@section('subtitle')
View Products
@endsection

@section('title')
View Products
@endsection


@section('open-main-pro')
nav-item menu-open
@endsection

@section('open-view1')
nav-link active
@endsection

@section('content')

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th style="width: 10px"> Sr. No.</th>
            <th style="width: 30px"> Category Id</th>
            <th style="width: 160px"> Name </th>
            <th style="width: 200px"> Image </th>
            <th style="width: 100px"> Description </th>
            <th style="width: 30px;"> Price </th>
            <th style="width: 150px"> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1; ?>
        @foreach ($products as $product )
            <tr>
                <td> {{  $count++ }}</td>
                {{-- <td> {{ $product->categoryId }}</td> --}}
                <td> {{ $product->category->name }}</td>
                <td> {{ $product->name }}</td>
                <td>
                    <center>
                        <img src="{{ asset('/productImage/'.$product->imagePath) }}" height="100px" width="150px"/>
                    </center>
                </td>
                <td>
                    {{ $product->description }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    <center>
                    <a href="{{ route('product.edit',['id'=>$product->productId]) }}" class="btn btn-success btn-sm" style="font-size:18px"><i class="fas fa-edit"> Edit</i></a>
                    <br>
                    <br>
                    <a href="{{ route('product.destroy',['id'=>$product->productId]) }}" onclick="return confirm('Are You Sure You Want To Delete This Item ?');" class="btn btn-danger btn-sm" style="font-size:18px"><i class="fas fa-trash"> Delete</i></a>
                    </center>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
