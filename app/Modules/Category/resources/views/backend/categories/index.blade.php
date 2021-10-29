@extends('backends.layouts.master')
@push('backend-stylesheet')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('backends/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.categories.index')) ? 'active' : '' }}">Categories</li>
        </ol>
    </nav>
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <h5 style="display: inline; margin-left:14px;">All Categories</h5>
                    <button class="btn btn-primary float-right mr-3 createCategory" style="margin-bottom: 20px">Create Category</button>
                    <a  id="trashCategories" class="btn btn-secondary float-right mr-2 trashCategories" style="margin-bottom: 20px">Trash Category</a>
                    <div class="table-responsive mb-4 mt-4" id="getCategories">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal animated zoomInUp" id="showCategoryModal" tabindex="-1" role="dialog" aria-labelledby="showCategoryLabel" aria-hidden="true">

</div>
<div class="modal animated zoomInUp" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryLabel" aria-hidden="true">

</div>
<div class="modal animated zoomInUp" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">

</div>



@endsection
@push('backend-scripts')

<script src="{{ asset('backends/assets/js/elements/tooltip.js') }}"></script>

{{-- Trash Data --}}
<script>
    $(document).on('click','#trashCategories',function (e){
        e.preventDefault();
        var trashUrl = "{{ route('backend.categories.getTrashCategories')}}";
        $.ajax({
            type: "GET",
            url: trashUrl,
            success: function(response){
                $('.table-responsive').attr('id','getTrashCategories');
                $('.trashCategories').text('View Category');
                $('.trashCategories').attr('id','getAllCategories');
                $('#getTrashCategories').html(response.view);
            },
            error: function(e){
                $('#getTrashCategories').html('');
                alert('error');
            },
            complete: function(){
                $('#getTrashCategories').show();
            }
        });
     });
</script>

{{-- Trash View Toogle to View All Post --}}
<script>
     $(document).on('click','#getAllCategories',function(){
        $('.table-responsive').attr('id','getCategories');
        loadGetCategories();
        $('#getAllCategories').text('Trash Category');
        $('#getAllCategories').attr('id','trashCategories');

     });
</script>

{{-- Create Category Modal --}}
<script>
    $(document).on('click','.createCategory',function(e){
        e.preventDefault();
        var viewUrl = "{{route('backend.categories.create')}}";
        $.ajax({
            url: viewUrl,
            success:function(resp){
                $("#createCategoryModal").modal('show');
                $("#createCategoryModal").html(resp);
            }
        });
    });
</script>

{{-- Store Category Modal --}}
<script>
    $(document).on('submit','#categoryStore', function(e){
        e.preventDefault();
        var currentevent =  $(this);
        currentevent.attr('disabled');
        var form = new FormData($('#categoryStore')[0]);
        var params = $('#categoryStore').serializeArray();
        var storeUrl = "{{route('backend.categories.store')}}";
        $.each(params,function (i, val){
            form.append(val.name, val.value)
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: storeUrl,
            contentType: false,
            processData: false,
            data: form,
            beforeSend: function(response) {

            },
            success: function(response) {
                loadGetCategories();
                $("#createCategoryModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '1em'
                });
                toast({
                    type: 'success',
                    title: response.message,
                    padding: '1em',
                });
                currentevent.attr('disabled', false);
            },
            error: function(err) {
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        if(el.length){
                            el.empty();
                        }
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(25000));
                    });
                }
                currentevent.attr('disabled', false);
            }
        });
    });
</script>

{{-- Show Category Modal --}}
<script>
    $(document).on('click','.showCategory',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.categories.show',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax(                {
            url: viewUrl,
            success:function(post){
                $("#showCategoryModal").modal('show');
                $("#showCategoryModal").html(post);
            }
        });
    });
</script>

{{-- Edit Category Modal --}}
<script>
    $(document).on('click','.editCategory',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.categories.edit',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax(                {
            url: viewUrl,
            success:function(resp){
                $("#editCategoryModal").modal('show');
                $("#editCategoryModal").html(resp);
            }
        });
    });
</script>

{{-- Update Category Modal --}}
<script>
    $(document).on('submit','#categoryUpdate', function(e){
        e.preventDefault();
        var currentevent =  $(this);
        currentevent.attr('disabled');
        var form = new FormData($('#categoryUpdate')[0]);
        var params = $('#categoryUpdate').serializeArray();
        var id = $(this).attr('data-id');
        var updateUrl = "{{route('backend.categories.update',':id')}}";
        updateUrl = updateUrl.replace(":id",id);
        $.each(params,function (i, val){
            form.append(val.name, val.value)
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: updateUrl,
            contentType: false,
            processData: false,
            data: form,
            beforeSend: function(response) {

            },
            success: function(response) {
                loadGetCategories();
                $("#editCategoryModal").modal('hide');
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '1em'
                });
                toast({
                    type: 'success',
                    title: response.message,
                    padding: '1em',
                });
                currentevent.attr('disabled', false);
            },
            error: function(err) {
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[class ="' + i + '"]');
                        if(el.length){
                            el.empty();
                        }
                        el.append($('<span style="color: red;">' + error[0] + '</span>').fadeOut(25000));
                    });
                }
                currentevent.attr('disabled', false);
            }
        });
    });
</script>

{{-- Category Status  --}}
<script>
    $(document).on('change','.sw-status',function () {
        var id = $(this).data('id');
        var viewUrl = "{{route('backend.categories.statusUpdate',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        var status = $(this).prop('checked') === true ? 1 : 0;
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type: "POST",
            dataType: "json",
            url: viewUrl,
            data: {'status': status,"_token": token},
            success: function (response) {
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
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

{{-- Delete Category --}}
<script>
    $(document).on('click','.deleteCategory',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var deleteUrl = "{{route ('backend.categories.delete',':id')}}";
        deleteUrl = deleteUrl.replace(":id",id);
        closeTr= $(this).closest('tr');
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
                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            padding: '1em'
                        });
                        toast({
                            type: response.status,
                            title: response.message,
                            padding: '1em',
                        });
                        closeTr.remove();
                    }
                });
            }
        });
    });
</script>

{{-- Get Category Table --}}
<script>
    loadGetCategories();
    function loadGetCategories(){
        $.ajax({
            type: "get",
            url : '{{ route("backend.categories.getCategories")}}',
            beforeSend: function(){
                $('#getCategories').hide();
            },
            success: function(e){
                $('#getCategories').html(e.view);
            },
            error: function(e){
                $('#getCategories').html('');
                alert('error');
            },
            complete: function(){
                $('#getCategories').show();
            }
        });
    }
</script>

{{-- DataTabel --}}
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

{{-- Category Permanent Delete --}}
<script>
    $(document).on('click','.permaDeleteCategory',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var permaDeleteUrl = "{{route ('backend.categories.permaDelete',':id')}}";
        permaDeleteUrl = permaDeleteUrl.replace(":id",id);
        closeTr= $(this).closest('tr');
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
                        closeTr.remove();
                    }
                });
            }
        });
    });
</script>

{{-- Category Restore --}}
<script>
    $(document).on('click','.undoDelete',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var undoDeleteUrl = "{{route('backend.categories.undoDelete',':id')}}";
        undoDeleteUrl = undoDeleteUrl.replace(":id",id);
        closeTr= $(this).closest('tr');
        $.ajax({
            url: undoDeleteUrl,
            success: function(response){
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
                closeTr.remove();
            }
        });
    });
</script>

@endpush
