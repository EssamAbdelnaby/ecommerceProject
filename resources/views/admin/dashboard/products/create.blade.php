@extends('admin.app')
@section('title') Create Product @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'Create Product' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Create Product' }}</h3>
                <form action="{{ route('products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sku">SKU <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sku') is-invalid @enderror" type="text" name="sku" id="sku" value="{{ old('sku') }}"/>
                            @error('sku') {{ $message }} @enderror
                        </div>
                     {{--   <div class="form-group">
                            <label class="control-label" for="slug">Slug <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}"/>
                            @error('slug') {{ $message }} @enderror
                        </div>--}}
                        <div class="form-group">
                            <label class="control-label" for="description">Description<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                            @error('description') {{ $message }} @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="categories">Categories</label>
                                    <select name="category_id" id="categories" class="form-control" >
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="categories">Brands</label>
                                    <select name="brand_id" id="brands" class="form-control" >
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="price">Price</label>
                                    <input
                                        class="form-control @error('price') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter product price"
                                        id="price"
                                        name="price"
                                        value="{{ old('price') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Quantity</label>
                                    <input
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        type="number"
                                        placeholder="Enter product quantity"
                                        id="quantity"
                                        name="quantity"
                                        value="{{ old('quantity') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary mr-2" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Product</button>
                        <a class="btn btn-secondary" href="{{ route('products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
        });
    </script>
@endpush
