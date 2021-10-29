@extends('backends.layouts.master')
@push('backend-stylesheet')
    <link href="{{asset('backends/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backends/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link href="{{asset('backends/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backends/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.carts.getAllCart')) ? 'active' : '' }}">Cart Products</li>
        </ol>
    </nav>
</div>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="col-4">
                        <a href="{{route('backend.carts.index')}}" class="btn btn-secondary">Back To Products</a>
                    </div>
                    <div class="table-responsive mb-4 mt-4" id="cart">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('backend-scripts')
    <script>
        loadcart();
        function loadcart(){
            $.ajax({
                type: "get",
                url : '{{ route("backend.carts.getCart")}}',
                beforeSend: function(){
                    $('#cart').hide();
                },
                success:function(e){
                    $('#cart').html(e.view);
                },
                error: function(e){
                    $('#cart').html('');
                    alert('error');
                },
                complete: function(){
                    $('#cart').show();
                }
            });
        }
    </script>
@endpush

