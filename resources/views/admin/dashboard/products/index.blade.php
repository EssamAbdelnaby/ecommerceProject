@extends('admin.app')
@section('title') Products @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Products</h1>
            <p>All products</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">Add Product</a>
    </div>
{{--    @include('admin.partials.flash')--}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>

                            <th> SKU </th>
                            <th> Category </th>
                            <th> Brand </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>

                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary "><i class="fa fa-edit m-0"></i></a>
                                            <a href="{{ route('products.destroy', $product->id) }}"
                                               onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"
                                               class="btn btn-sm btn-danger"><i class="fa fa-trash m-0"></i></a>
                                            <form id="delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
