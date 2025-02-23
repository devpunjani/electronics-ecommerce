@extends('layout.app')

@section('title')
View Categories
@endsection

@section('subtitle')
View Category
@endsection


@section('open-main')
nav-item menu-open
@endsection

@section('open-view')
nav-link active
@endsection

@section('content')

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th style="width: 10px"> Sr. No.</th>
            <th style="width: 200px"> Name </th>
            <th style="width: 300px"> Image </th>
            <th style="width: 150px"> Action </th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1; ?>
        @foreach ($categories as $category )
            <tr>
                <td> {{  $count++ }}</td>
                <td> {{  $category->name }}</td>
                <td>
                    <center>
                        <img src="{{ asset('/categoryImage/'.$category->imagePath) }}" height="100px" width="150px"/>
                    </center>
                </td>
                <td>
                    <center>
                    <a href="{{ route('category.edit',['id'=>$category->categoryId]) }}" class="btn btn-success btn-sm" style="font-size:18px"><i class="fas fa-edit"> Edit</i></a>
                    <br>
                    <br>
                    <a href="{{ route('category.destroy',['id'=>$category->categoryId]) }}" onclick="return confirm('Are You Sure You Want To Delete This Item ?');" class="btn btn-danger btn-sm" style="font-size:18px"><i class="fas fa-trash"> Delete</i></a>
                    </center>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
