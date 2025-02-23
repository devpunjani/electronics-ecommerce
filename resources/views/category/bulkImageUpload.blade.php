@extends('layout.app');

@section('title')
Bulk Image Upload
@endsection


@section('subtitle')
Bulk Image Upload
@endsection

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <div class="card-body">
        <form method="post" action="{{ route('category.bulkImageUploadAttempt') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Bulk Upload Image Files For Categories</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="image[]" style="width:50%;" multiple >
                </div>

                <div class="col-4 form-group">
                    <input type="submit" value="Upload Images" class="btn btn-success"/>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-image-bulk')
nav-link active
@endsection


