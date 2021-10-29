
<table id="zero-config" class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($trashUsers as $user)
    <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{ucfirst ($user->getRoles) ?? 'No Roles Provided'}}</td>
        <td>
            <a type="button" data-id ="{{$user->id}}" class="btn btn-primary undoDelete" style="display: inline-block">Undo Delete</a>
            <a type="button" data-id="{{$user->id}}" class="btn btn-danger permaDeleteUser" style="display: inline-block">Delete Permanently</a>
        </td>

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
