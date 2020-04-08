@extends('backend.layouts.app')

@section('title',  'Product Bulk Upload | Upload file')

@section('content')
<form action="{{route('admin.productbulkupload.import')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Product Bulk Upload
                        <small class="text-muted">Upload CSV File</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="file">
                            Select CSV File
                        </label>

                        <div class="col-md-10">
                            <input type="file" name="file" id="file" class="form-control" required autofocus accept=".csv">
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="/" class="btn btn-danger btn-sm">{{ __('buttons.general.cancel') }}</a>
                </div><!--col-->

                <div class="col text-right">
                    <button type="submit" class="btn btn-success btn-sm">Import Products</button>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
</form>
@endsection
