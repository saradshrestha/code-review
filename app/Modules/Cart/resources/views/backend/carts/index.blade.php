@extends('backends.layouts.master')
@push('backend-stylesheet')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('backends/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link href="{{asset('backends/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.carts.index')) ? 'active' : '' }}">Products</li>
        </ol>
    </nav>
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <a href="{{route('backend.carts.getAllCart')}}" class="btn btn-secondary float-left ml-3" style="margin-bottom: 20px">View Product Cart</a>
                    <div class="table-responsive mb-4 mt-4" id="products">
                        <table id="zero-config" class="table table-hover " style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>
                                    {{-- <a type="button" href="{{route('backend.carts.store', $product->id)}}"class="btn btn-primary addToCart" style="display: inline-block">
                                        Add To Cart
                                    </a> --}}
                                    <a type="button" data-id="{{$product->id}}" class="btn btn-primary addToCart" style="display: inline-block">
                                        Add To Cart
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('backend-scripts')

    <script src="{{asset('backends/assets/js/custom.js')}}"></script>
    <script src="{{asset('backends/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>

    <script>
        $(document).ready(function ()
        {
            $('.addToCart').on('click',function ()
            {
                var id = $(this).attr('data-id');
                var addUrl = "{{route ('backend.carts.store')}}";
                $.ajax(
                {
                    method: "Post",
                    data:{
                        _token: '{{ csrf_token() }}',
                        id: id,
                        },
                    url: addUrl,
                    success: function(response)
                    {
                        if (response.success === true)
                        {
                            const toast = swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                padding: '1em'
                            });
                            toast({
                                type: 'success',
                                title: response.message,
                                padding: '1em',
                            });
                        }
                        else
                        {
                            const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            padding: '1em'
                            });
                            toast({
                                type: 'error',
                                title: "Opps!!!. Something Went Wrong",
                                padding: '1em',
                            });
                        }
                    }
                });
            });
        });

    </script>

@endpush
