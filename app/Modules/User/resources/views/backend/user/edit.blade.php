<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createUserLabel">Update User Details</h5>
        </div>
        <div class="modal-body">
            <form id="userUpdate" data-id={{ $user->id }} enctype="multipart/form-data">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="name">User Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{  $user->name ?? old('name') }}">
                        <div class="name"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="email">User E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-Mail Address" name="email" value="{{ $user->email ?? old('email') }}">
                        <div class="email"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for = "status">Status</label>
                        <select class="custom-select" name="status">
                            <option disabled selected>Selete User Status</option>
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <div class="status"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>User's Role</label>
                        <select class="custom-select" name="role">
                            <option disabled >Select Role For User</option>
                            <option value="author" {{ $user->getRoles == 'author' ? 'selected' : '' }} >Author</option>
                            <option value="editor" {{ $user->getRoles == 'editor' ? 'selected' : '' }} >Editor</option>
                            <option value="admin" {{ $user->getRoles == 'admin' ? 'selected' : '' }} >Admin</option>
                        </select>
                        <div class="role"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
            </form>
        </div>
    </div>
</div>
