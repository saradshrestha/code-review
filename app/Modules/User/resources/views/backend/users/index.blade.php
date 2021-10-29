@extends('backends.layouts.master')
@push('backend-stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('backends/plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('backends/plugins/table/datatable/dt-global_style.css') }}">
<link href="{{ asset('backends/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.users.index')) ? 'active' : '' }}">Users</li>
        </ol>
    </nav>
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 style="display: inline; margin-left:14px;">All Users</h5>
                    <a class="btn btn-primary float-right mr-3" id="createUser" style="margin-bottom: 20px">Create User</a>
                    <a href="{{route('backend.users.trash')}}" class="btn btn-secondary float-right mr-2" style="margin-bottom: 20px">Trashed User</a>
                    <div class="table-responsive mb-4 mt-4" id="getUsers">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal animated zoomInUp" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">

</div>

<div class="modal animated zoomInUp" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">

</div>

<div class="modal animated zoomInUp" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">

</div>

@endsection


@push('backend-scripts')
    <script src="{{ asset('backends/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backends/plugins/table/datatable/datatables.js') }}"></script>

{{-- Change Password Model  --}}
<script>
    $(document).on('click','.changePassword',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.users.changePassword',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax({
            url: viewUrl,
            success:function(resp){
                $("#changePasswordModal").modal('show');
                $("#changePasswordModal").html(resp);
            }
        });
    });
</script>


{{--Password Change Submit  --}}
<script>
    $(document).on('submit','#passwordSubmit',function(e){
        e.preventDefault();
        var id = $('#passwordSubmit').data('id');
        //alert(id);
        var submitUrl = "{{route('backend.users.passwordSubmit',':id')}}";
        submitUrl = submitUrl.replace(":id",id);
        var form = $('#passwordSubmit')[0];
        var data = new FormData(form);
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type: "post",
            url: submitUrl,
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response){
                // console.log(response);
                $("#changePasswordModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    padding: '1em'
                });
                toast({
                    type: response.status,
                    title: response.message,
                    padding: '1em',
                });
            },
            error: function(response){
                if(response.status == 422){
                    $.each(response.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(20000));
                    });
                }
            }
        });
    });

</script>

{{-- User Create Modal --}}
<script>
    $(document).on('click','#createUser',function(e)    {
        e.preventDefault();
        var viewUrl = "{{route('backend.users.create')}}";
        $.ajax({
            url: viewUrl,
            success:function(resp)            {
                $("#createUserModal").modal('show');
                $("#createUserModal").html(resp);
            }
        });
    });
</script>

{{-- Store New User --}}
<script>
    $(document).on('submit','#userStore',function (e){
        e.preventDefault();
        var storeUrl = "{{route('backend.users.store')}}";
        var form = $('#userStore')[0];
        var data = new FormData(form);
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type:'POST',
            enctype: 'multipart/form-data',
            url: storeUrl,
            processData: false,
            contentType: false,
            data: data,
            dataType: "json",
            cache:false,
            success: function(response) {
                loadGetUsers();
                $("#createUserModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    padding: '1em'
                });
                toast({
                    type: response.status,
                    title: response.message,
                    padding: '1em',
                });
            },
            error: function(response){
                if(response.status == 422){
                    $.each(response.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        if(el.length){
                            el.empty();
                        }
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(20000));
                    });
                }
                currentevent.attr('disabled', false);
            }
        });
    });
</script>

{{-- Edit Model  --}}
<script>
    $(document).on('click','.editUser',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.users.edit',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax(
        {
            url: viewUrl,
            success:function(resp)
            {
                $("#editUserModal").modal('show');
                $("#editUserModal").html(resp);
            }
        });
    });
</script>

{{--  User Data Update --}}
<script>
    $(document).on('submit','#userUpdate',function(e){
        e.preventDefault();
        var updateUrl = "{{route('backend.users.update',':id')}}";
        var id =  $(this).attr('data-id');
        updateUrl = updateUrl.replace(":id",id);
        var form = $('#userUpdate')[0];
        var data = new FormData(form);
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type:'POST',
            url: updateUrl,
            processData: false,
            contentType: false,
            data: data,
            dataType: "json",
            success: function(response){
                console.log('success');
                loadGetUsers();
                $("#editUserModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    padding: '1em'
                });
                toast({
                    type: response.status,
                    title: response.message,
                    padding: '1em',
                });
            },
            error: function(response){
                if(response.status == 422){
                    $.each(response.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        if(el.length){
                            el.empty();
                        }
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
                    });
                }
                currentevent.attr('disabled', false);
            }
        });
    });
</script>

{{-- Delete User --}}
<script>
    $(document).on('click','.deleteUser',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var deleteUrl = "{{route ('backend.users.delete',':id')}}";
        deleteUrl = deleteUrl.replace(":id",id);
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
            if (result.value){
                $.ajax({
                    url: deleteUrl,
                    success: function(response){
                        loadGetUsers();
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

{{-- Change Status --}}
<script>
    $(document).on('change','.sw-status',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var viewUrl = "{{route('backend.users.statusUpdate',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        var status = $(this).prop('checked') === true ? 1 : 0;
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type: "POST",
            dataType: "json",
            url: viewUrl,
            data: {'status': status,"_token": token},
            success: function(response){
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '1em'
                });
                toast({
                    type: "success",
                    title: response.message,
                    padding: '1em',
                });
            }
        });
    });
</script>

{{-- Get User Table --}}
<script>
    loadGetUsers();
    function loadGetUsers(){
        $.ajax({
            type: "get",
            url : '{{ route("backend.users.getUsers")}}',
            beforeSend: function(){
                $('#getUsers').hide();
            },
            success:function(e){
                $('#getUsers').html(e.view);
            },
            error: function(e){
                $('#getUsers').html('');
                alert('error');
            },
            complete: function(){
                $('#getUsers').show();
            }
        });
    }
</script>

{{-- Datatable --}}
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

@endpush
