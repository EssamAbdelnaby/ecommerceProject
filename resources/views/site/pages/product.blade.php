@extends('site.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    @if ($product->image!='')
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset('storage/products/'.$product->image) }}" data-fancybox="">
                                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="img-small-wrap">
                                            <div class="item-gallery">
                                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="">
                                            </div>
                                        </div>
                                    @endif

                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <div class="col-md-12">
                                        <article class="card mt-4">
                                            <div class="card-body">
                                                <dt>Quantity: <span class="badge badge-info">{{ $product->quantity }}</span></dt>
                                                {!! $product->description !!}
                                            </div>
                                        </article>
                                    </div>

                                </article>
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
