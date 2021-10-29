<table id="zero-config" class="table table-hover">
    <thead>
    <tr>
        <th>Post Title</th>
        <th>Post Slug</th>
        <th>Status</th>
        <th>Published</th>
        <th width=80px>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->post_title }}</td>
        <td>{{ $post->post_slug }}</td>
        <td>
            <label class="switch s-icons s-outline s-outline-success mr-2">

                <input type="checkbox" class="sw-status" data-id="{{$post->id}}" {{ $post->post_status == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                {{-- @hasanyrole('admin|editor')
                    <input type="checkbox" class="sw-status" data-id="{{$post->id}}" {{ $post->post_status == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                @else
                    @if( $post->post_status == 1)
                        <span class="badge outline-badge-primary"> Active </span>
                    @else
                        <span class="badge outline-badge-danger"> Inactive </span>
                    @endif

                @endhasanyrole --}}
            </label>
        </td>
        <td>
            <label class="switch s-icons s-outline s-outline-success mr-2">
                <input type="checkbox" class="sw-published" data-id="{{$post->id}}" {{ $post->is_published == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                {{-- @hasanyrole('admin|editor')
                    <input type="checkbox" class="sw-published" data-id="{{$post->id}}" {{ $post->is_published == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                @else
                    @if( $post->post_status == 1)
                        <span class="badge outline-badge-primary"> Published </span>
                    @else
                        <span class="badge outline-badge-danger"> Not Published </span>
                    @endif
                @endhasanyrole --}}
            </label>
        </td>
        <td>
            <a type="button" data-id ="{{$post->id}}" class="btn btn-secondary showPost" style="display: inline-block" data-target="#showPost{{$post->id}}" data-toggle="modal">
                Show
            </a>
            <a type="button"  data-id ="{{$post->id}}" class="btn btn-primary editPost" style="display: inline-block" data-target="#editPost{{$post->id}}" data-toggle="modal">
                Edit
            </a>
            <a type="button" data-id="{{$post->id}}" class="btn btn-danger deletePost" style="display: inline-block">
                Delete
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>



{{-- Data table --}}
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



