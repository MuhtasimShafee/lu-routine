@extends('admin.index')
@section('content')
<style>
    input.blogupimage.form-control {
	padding: 22px 15px;
	background: #36ccba;
	height: 70px;
	cursor: pointer;
}
</style>
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Update Course
        </h3>
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{route('section.update',[$section->id])}}"  method="post">
        
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Section Name</label>
                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{$section->name}}" placeholder="name" />
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Batch ID</label>
                <input type="text" name="batch_id" class="form-control{{ $errors->has('batch_id') ? ' is-invalid' : '' }}"
                    value="{{$section->batch_id}}" placeholder="batch_id" />
                @if ($errors->has('batch_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('batch_id') }}</strong>
                </span>
                @endif
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection