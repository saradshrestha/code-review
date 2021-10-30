
<table id="zero-config" class="table table-hover">
    <thead>
        <tr>
            <th>User Name</th>
            <th>User E-mail</th>
            <th>User Status</th>
            <th>User Role</th>
            <th style="width:110px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td style="width: 40px;">{{ $user->email }}</td>
            <td>
                <label class="switch s-icons s-outline s-outline-success mr-2">
                    <input type="checkbox" class="sw-status" data-id="{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }}>
                    <span class="slider round"></span>
                </label>
            </td>
            <td>
                @forelse ($user->getRoleNames () as $roleName )
                    @if ($roleName == 'admin')
                        <span class="badge outline-badge-success"> {{ ucfirst($roleName) }} </span>
                    @elseif ( $roleName == 'editor')
                        <span class="badge outline-badge-secondary"> {{ ucfirst($roleName) }} </span>
                    @else
                    <span class="badge outline-badge-info"> {{ ucfirst($roleName) }} </span>
                @endif

                @empty
                <span class="badge outline-badge-warning"> No Roles Provided </span>
                @endforelse

            </td>

            <td>
                <a type="button" data-id ="{{ $user->id }}" class="btn btn-secondary changePassword" style="display: inline-block" data-target="#changePassword{{ $user->id }}" data-toggle="modal">
                    Change Password
                </a>
                <a type="button" data-id ="{{ $user->id }}" class="btn btn-primary editUser" style="display: inline-block" data-target="#editUser{{ $user->id }}" data-toggle="modal">
                    Edit
                </a>
                <a type="button" data-id="{{ $user->id }}" class="btn btn-danger deleteUser" style="display: inline-block">
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
