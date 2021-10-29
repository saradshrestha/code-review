<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('backends/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('backends/assets/js/app.js') }}"></script>
<script src="{{ asset('backends/assets/js/loader.js') }}"></script>
<script src="{{ asset('backends/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('backends/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('backends/bootstrap/js/bootstrap.min.js') }}"></script>
{{-- End --}}
<script src="{{ asset('backends/plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('backends/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('backends/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
<script src="{{ asset('backends/plugins/table/datatable/datatables.js') }}"></script>
<script src="{{ asset('backends/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('backends/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>


<script>
    $(document).ready(function() {
        App.init();
    });
</script>

@if (Session::has('success'))
    <script type="text/javascript">
        const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        padding: '1em'
        });
        toast({
            type: 'success',
            title: '{{Session::get('success')}}',
            padding: '1em',
        })
    </script>
@endif


@if (Session::has('error'))
    <script type="text/javascript">
        const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 9000,
        padding: '1em'
        });
        toast({
            type: 'error',
            title: '{{Session::get('error')}}',
            padding: '1em',
        })
    </script>
@endif


@if (Session::has('delete.msg'))
<script type="text/javascript">
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        padding: '1em'
    });
    toast({
        type: 'success',
        title: '{{Session::get('delete.msg')}}',
        padding: '1em',
    })
    </script>
@endif

@stack('backend-scripts')
