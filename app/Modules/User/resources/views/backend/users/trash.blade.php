@extends('backends.layouts.master')
@push('backend-stylesheet')

@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">Users</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.users.trash')) ? 'active' : '' }}">Trash Users</li>
        </ol>
    </nav>
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 style="display: inline; margin-left:14px;">All Trashed Users</h5>
                    <a href="{{route('backend.users.index')}}" class="btn btn-secondary float-right mr-2" style="margin-bottom: 20px">View Users</a>
                    <div class="table-responsive mb-4 mt-4 " id="getTrashUsers">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@push('backend-scripts')

{{-- Get Trash User Table --}}
<script>
    loadGetTrashUsers();
    function loadGetTrashUsers(){
        $.ajax({
            type: "get",
            url : '{{ route("backend.users.getTrashUsers") }}',
            beforeSend: function(){
                $('#getTrashUsers').hide();
            },
            success:function(e){
                $('#getTrashUsers').html(e.view);
            },
            error: function(e){
                $('#getTrashUsers').html('');
                alert('Something Went Wrong');
            },
            complete: function(){
                $('#getTrashUsers').show();
            }
        });
    }
</script>

{{-- Permanent User Delete --}}
<script>
    $(document).on('click','.permaDeleteUser',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var closetr = $(this).closest('tr');
        var permaDeleteUrl = "{{route ('backend.users.permaDelete',':id')}}";
        permaDeleteUrl = permaDeleteUrl.replace(":id",id);
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em',
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(result){
            if(result.value){
                $.ajax({
                    url: permaDeleteUrl,
                    success: function(response){
                        loadGetTrashUsers();
                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            padding: '1em'
                        });
                        toast({
                            type: 'success',
                            title: response.message,
                            padding: '1em',
                        });
                    }
                });
            }
        });
    });
</script>

{{-- Restore Users--}}
<script>
    $(document).on('click','.undoDelete',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var undoDeleteUrl = "{{route('backend.users.undoDelete',':id')}}";
        undoDeleteUrl = undoDeleteUrl.replace(":id",id);
        $.ajax({
            url: undoDeleteUrl,
            success: function(response){
                loadGetTrashUsers();
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
        });
    });

</script>

@endpush
