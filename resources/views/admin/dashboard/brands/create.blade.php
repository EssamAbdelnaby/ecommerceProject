@extends('admin.app')
@section('title') Create Brand @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'Create Brand' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Create Brand' }}</h3>
                <form action="{{ route('brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        {{--<div class="form-group">
                            <label class="control-label" for="slug">Slug <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}"/>
                            @error('slug') {{ $message }} @enderror
                        </div>--}}
                        <div class="form-group">
                            <label class="control-label" for="description">Description<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('name') is-invalid @enderror" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                            @error('name') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label">Brand Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary mr-2" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Brand</button>
                        <a class="btn btn-secondary" href="{{ route('brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
