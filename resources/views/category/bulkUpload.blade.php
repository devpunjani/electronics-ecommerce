@extends('layout.app');

@section('title')
Bulk Upload
@endsection


@section('subtitle')
Bulk Upload
@endsection

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <div class="card-body">
        <form method="post" action="{{ route('category.bulkUploadAttempt') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="mb-3">
                    <label for="formFile" class="form-label">File For Bulk Upload Categories</label>
                    <input class="form-control" type="file" id="formFile" name="csvFile" value="{{ old('csvFile') }}" style="width:50%;">
                </div>

                <div class="col-4 form-group">
                    <input type="submit" value="Upload" class="btn btn-success"/>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-bulk')
nav-link active
@endsection


