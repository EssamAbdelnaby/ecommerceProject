@extends('admin.app')
@section('title') {{ 'Edit Product'  }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ 'Edit Product' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ 'Edit Product'  }}</h3>
                <form action="{{ route('products.update',$targetProduct->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetProduct->name) }}"/>
                            <input type="hidden" name="id" value="{{ $targetProduct->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        {{--<div class="form-group">
                            <label class="control-label" for="slug">Slug <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug', $targetProduct->slug) }}"/>
                            @error('slug') {{ $message }} @enderror
                        </div>--}}
                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $targetProduct->description) }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="categories">Categories</label>
                                    <select name="category_id" id="categories" class="form-control" >
                                        @foreach($categories as $category)
                                            @php $check = $category->id == $targetProduct->category_id ? 'selected' : ''@endphp
                                            <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="brands">Brands</label>
                                    <select name="brand_id" id="brands" class="form-control" >
                                        @foreach($brands as $brand)
                                            @php $check = $brand->id == $targetProduct->brand_id ? 'selected' : ''@endphp
                                            <option value="{{ $brand->id }}" {{ $check }}>{{ $brand->name }}</option>
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
                                        value="{{ old('price', $targetProduct->price) }}"
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
                                        value="{{ old('quantity', $targetProduct->quantity) }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetProduct->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/products/'.$targetProduct->image) }}" id="productImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Product Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
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
