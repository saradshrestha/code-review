<table id="zero-config" class="table table-hover">
    <thead>
    <tr>
        <th>Category Name</th>
        <th>Category Slug</th>
        <th>Status</th>
        <th>Category Type</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->title}}</td>
        <td>{{$category->slug}}</td>
        <td>
            <label class="switch s-icons s-outline s-outline-success mr-2">
                {{-- @hasanyrole('admin|editor') --}}
                    <input type="checkbox" class="sw-status" data-id="{{$category->id}}" {{ $category->status == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                {{-- @else
                @if( $category->status == 1)
                    <span class="badge outline-badge-primary"> Active  </span>
                @else
                    <span class="badge outline-badge-danger"> Inactive </span>
                @endif
                @endhasanyrole --}}
            </label>
        </td>
        <td>
            @if($category->parent_id == 0)
                <span class="badge badge-success"> Main Category </span>
            @else
                {{-- <span class="badge badge-primary"> Sub Category </span> --}}
                <span class="badge badge-info  bs-popover mb-3" data-container="body" data-content="{{ $category->parent->title }}">
                    Sub Category
                </span>
            @endif
        </td>
    <td>
        <button data-id ="{{$category->id}}" class="btn btn-secondary showCategory" style="display: inline-block" data-target="#showCategory{{$category->id}}" data-toggle="modal">
            Show
        </button>
        <button data-id="{{ $category->id}}" class="btn btn-primary editCategory" style="display: inline-block" data-target="#editCategory{{$category->id}}">
            Edit
        </button>
        <button data-id="{{$category->id}}" class="btn btn-danger deleteCategory" style="display: inline-block">
            Delete
        </button>
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
