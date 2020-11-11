@extends('admin.app')
@section('title') {{ 'Edit brand'  }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'Edit brand' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Edit brand'  }}</h3>
                <form action="{{ route('brands.update',$targetBrand->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetBrand->name) }}"/>
                            <input type="hidden" name="id" value="{{ $targetBrand->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                      {{--  <div class="form-group">
                            <label class="control-label" for="slug">Slug <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $targetBrand->slug) }}"/>
                            @error('slug') {{ $message }} @enderror
                        </div>--}}
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $targetBrand->description) }}</textarea>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetBrand->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/brands/'.$targetBrand->image) }}" id="brandImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Brand Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update brand</button>
                        <a class="btn btn-secondary" href="{{ route('brands.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
