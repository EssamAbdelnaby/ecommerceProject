@extends('site.app')
@section('title', 'Homepage')

@section('content')
    <section class="section-request bg padding-y-sm">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"><img src="{{ asset('storage/products/'.$product->image) }}"></div>
                        <figcaption class="info-wrap">
                            <h4 class="title">{{ $product->name }}</h4>
                            <p class="desc">{!! $product->description !!}</p>
                            <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="bottom-wrap">
                            <a href="{{route('product.show',$product->slug)}}" class="btn btn-sm btn-primary float-right">Details</a>
                            <div class="price-wrap h5">
                                <span class="price-new">{{$product->price}}</span>
                            </div>
                            <!-- price-wrap.// -->
                        </div>
                        <!-- bottom-wrap.// -->
                    </figure>
                </div>
                @endforeach
            </div>

            {{ $products->withQueryString()->links() }}

        </div>
    </section>
@stop
