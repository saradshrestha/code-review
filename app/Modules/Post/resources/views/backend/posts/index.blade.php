@extends('backends.layouts.master')
@push('backend-stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset('backends/plugins/table/datatable/datatables.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('backends/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('backends/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('backends/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backends/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">


@endpush
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.posts.index')) ? 'active' : '' }}">Posts</li>
        </ol>
    </nav>
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 style="display:inline-block; margin-left:14px;">All Posts</h4>
                        <div class="form-group dateFilter" style="display:flex; align-items:center; ">
                            <h6>Filter By Date</h6>
                            <input id="rangeCalendarFlatpickr" name ="post_date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                        </div>
                        <div>
                            <a class="btn btn-primary float-right mr-3 createPost" style="margin-bottom: 20px">Create Post</a>
                            <a class="btn btn-secondary float-right mr-2 trashPosts" id="trashPosts">Trashed Post</a>
                        </div>
                    </div>
                    <div class="table-responsive mb-4" id="getPosts">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal animated zoomInUp" id="showPostModal" tabindex="-1" role="dialog" aria-labelledby="showPostLabel" aria-hidden="true">

</div>

<div class="modal animated zoomInUp" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostLabel" aria-hidden="true">

</div>

<div class="modal animated zoomInUp" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostLabel" aria-hidden="true">

</div>



@endsection
@push('backend-scripts')
<script src="{{ asset('backends/plugins/flatpickr/flatpickr.js') }} "></script>

{{-- Post Filter By Date --}}
<script>
    $(".flatpickr").flatpickr({
        mode: "range",
        disableMobile: "true",
        altInput: true,
        altFormat: "Y/m/d",
        dateFormat: "Y/m/d",
        onClose: function(selectedDates, dateStr, instance) {
            var dateStart = instance.formatDate(selectedDates[0], "Y/m/d");
            var dateEnd = instance.formatDate(selectedDates[1], "Y/m/d");
            var filterUrl = "{{route('backend.posts.filterByDate')}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: filterUrl,
                data:{'start_date': dateStart, 'end_date': dateEnd },
                success: function(response){
                    $('.table-responsive').attr('id','getFilteredPosts');
                    $('#getFilteredPosts').html(response.view);
                },
                error: function(e){
                    $('#getFilteredPosts').html('');
                    console.log('error');
                },
                complete: function(){
                    $('#getFilteredPosts').show();
                }
            });
        }
    });
</script>

{{-- Post Show Model --}}
<script>
    $(document).on('click','.showPost',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.posts.show',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax({
            url: viewUrl,
            success:function(post){
                $("#showPostModal").modal('show');
                $("#showPostModal").html(post);
            }
        });
    });
</script>

{{-- Post Delete  --}}
<script>
    $(document).on('click','.deletePost',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var deleteUrl = "{{route ('backend.posts.delete',':id')}}";
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

{{-- Post Edit Model --}}
<script>
    $(document).on('click','.editPost',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.posts.edit',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        $.ajax({
            url: viewUrl,
            success:function(resp){
                $("#editPostModal").modal('show');
                $("#editPostModal").html(resp);
            }
        });
    });
</script>

{{-- Get Post Table --}}
<script>
    loadGetPosts();
    function loadGetPosts(){
        $.ajax({
            type: "get",
            url : '{{ route("backend.posts.getPosts")}}',
            beforeSend: function(){
                $('#getPosts').hide();
            },
            success:function(e){
                $('#getPosts').html(e.view);
            },
            error: function(e){
                $('#getPosts').html('');
                alert('error');
            },
            complete: function(){
                $('#getPosts').show();
            }
        });
    }
</script>

{{-- Post Create Modal --}}
<script>
    $(document).on('click','.createPost',function(e)
    {
        e.preventDefault();
        var viewUrl = "{{route('backend.posts.create')}}";
        $.ajax(
        {
            url: viewUrl,
            success:function(resp)
            {
                $("#createPostModal").modal('show');
                $("#createPostModal").html(resp);
            }
        });
    });
</script>

{{-- Post Update --}}
<script>
    $(document).on('submit','#postEdit',function (e) {
        e.preventDefault();
        var currentevent =  $(this);
        currentevent.attr('disabled');
        var id = $(this).attr('data-id');
        var updateUrl = "{{route('backend.posts.update',':id')}}";
        updateUrl = updateUrl.replace(":id",id);
        var form = $(this)[0];
        var data = new FormData(form);
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
        });
        $.ajax({
            type:'POST',
            enctype: 'multipart/form-data',
            url: updateUrl,
            processData: false,
            contentType: false,
            data: data,
            dataType: "json",
            cache:false,
            success: function(response) {
                loadGetPosts();
                $("#editPostModal").modal('hide');
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
                    padding: '2em',
                });
                currentevent.attr('disabled', false);
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

{{-- Post Create Store --}}
<script>
    $(document).on('submit','#postStore', function(e){
        e.preventDefault();
        var currentevent =  $(this);
        currentevent.attr('disabled');
        var form = new FormData($('#postStore')[0]);
        var params = $('#postStore').serializeArray();
        var storeUrl = "{{route('backend.posts.store')}}";
        $.each(params,function (i, val) {
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

            },success: function(response) {
                loadGetPosts();
                $("#createPostModal").modal('hide');
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
            },error: function(err) {
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

{{-- Post Publish Update --}}
<script>
    $(document).on('change','.sw-published',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var viewUrl = "{{route('backend.posts.publishUpdate',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        var post_publish = $(this).prop('checked') === true ? 1 : 0;
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type: "POST",
            dataType: "json",
            url: viewUrl,
            data: {'post_publish': post_publish,"_token": token},
            success: function (response){
                if (response.success === true) {
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
            }
        });
    });

</script>

{{-- Post Status Update --}}
<script>
    $(document).on('change','.sw-status',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var viewUrl = "{{route('backend.posts.statusUpdate',':id')}}";
        viewUrl = viewUrl.replace(":id",id);
        var post_status = $(this).prop('checked') === true ? 1 : 0;
        var token = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
            type: "POST",
            dataType: "json",
            url: viewUrl,
            data: {'post_status': post_status,"_token": token},
            success: function(response) {
                if(response.success === true) {
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
            }
        });
    });
</script>

{{-- Post Permanent Delete --}}
<script>
    $(document).on('click','.permaDeletePost',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var permaDeleteUrl = "{{route ('backend.posts.permaDelete',':id')}}";
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
                            timer: 1500,
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

{{-- Post Restore --}}
<script>
    $(document).on('click','.undoDelete',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var undoDeleteUrl = "{{route('backend.posts.undoDelete',':id')}}";
        undoDeleteUrl = undoDeleteUrl.replace(":id",id);
        closeTr= $(this).closest('tr');
        $.ajax({
            url: undoDeleteUrl,
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
    });
</script>

{{-- Trash Data --}}
<script>
    $(document).on('click','#trashPosts',function (e){
        e.preventDefault();
        var trashUrl = "{{route('backend.posts.getTrashPosts')}}";
        $.ajax({
            type: "GET",
            url: trashUrl,
            success: function(response){
                $('.table-responsive').attr('id','getTrashPosts');
                $('.trashPosts').text('View Post');
                $('.trashPosts').attr('id','getAllPosts');
                $('#getTrashPosts').html(response.view);
                $('.dateFilter').hide();
            },
            error: function(e){
                $('#getTrashPosts').html('');
                alert('error');
            },
            complete: function(){
                $('#getTrashPosts').show();
            }
        });
     });
</script>

{{-- Trash View Toogle to View All Post --}}
<script>
     $(document).on('click','#getAllPosts',function(){
        $('.table-responsive').attr('id','getPosts');
        loadGetPosts();
        $('#getAllPosts').text('Trash Post');
        $('#getAllPosts').attr('id','trashPosts');
        $('.dateFilter').show();
     });
</script>


@endpush
