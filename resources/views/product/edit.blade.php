@extends('layout.app')

@section('subtitle')
Edit Product
@endsection


@section('title')
Edit Product
@endsection


@section('open-main-pro')
nav-item menu-open
@endsection

@section('open-edit1')
nav-link active
@endsection

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection

@section('content')
    <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="categoryId" value="{{ $product->categoryId }}"/>
        <input type="hidden" name="productId" value="{{ $product->productId }}"/>
        <div class="row" >
            <div class="col-12 form-group">
                <label class="form-label"> Name </label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" style="width:500px;"/>
            </div>

            <div class="col-12 form-group">
                <div style="width:500px;">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="imagePath">
                </div>
            </div>

            <div class="col-12 form-group">
                <label class="form-label"> Description </label>
                <textarea type="text" name="description" rows="4" style="width:500px;" class="form-control" value="{{ $product->description }}">
                </textarea>
            </div>

            <div class="col-12 form-group">
                <label class="form-label"> Price </label>
                <input type="number" name="price" class="form-control" style="width:500px;" value="{{ $product->price }}"/>
            </div>

            &nbsp;
            <div class="col-12 form-group" style="margin-left:200px;">
                <input type="submit" value="Update" class="btn btn-success" style="font-size: 20px;width:100px;border-radius:30px;"/>
            </div>
    </form>
@endsection

