@extends('layout.app')

@section('title')
Edit Category
@endsection

@section('subtitle')
Edit Category
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-edit')
nav-link active
@endsection

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection

@section('content')
    <form method="post" action="{{ route('category.update') }}">
    @csrf
        <input type="hidden" name="categoryId" value="{{ $category->categoryId }}"/>
        <div class="row" >
            <div class="col-12 form-group">
                <label class="form-label"> Name </label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" style="width:500px;"/>
            </div>

            <div class="col-12 form-group">
                <div style="width:500px;">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="imagePath" value="">
                </div>
            </div>

            &nbsp;
            <div class="col-12 form-group" style="margin-left:200px;">
                <input type="submit" value="Update" class="btn btn-success" style="font-size: 20px;width:100px;border-radius:30px;"/>
            </div>
    </form>
@endsection

