@extends('admin.app')
@section('title') Brands @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Brands</h1>
            <p>All Brands</p>
        </div>
        <a href="{{ route('brands.create') }}" class="btn btn-primary pull-right">Add Brand</a>
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
                            <th> Description </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->description }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-sm btn-primary "><i class="fa fa-edit m-0"></i></a>
                                            <a href="{{ route('brands.destroy', $brand->id) }}"
                                               onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();"
                                               class="btn btn-sm btn-danger"><i class="fa fa-trash m-0"></i></a>



                                            <form id="delete-form" action="{{ route('brands.destroy', $brand->id) }}" method="POST" style="display: none;">
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
