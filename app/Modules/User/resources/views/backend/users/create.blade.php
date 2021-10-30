<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createUserLabel">Add New User</h5>
        </div>
        <div class="modal-body">
            <form id="userStore" enctype="multipart/form-data">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="name">User Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{ old('name') }}" >
                        <div class="name"></div>

                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="email">User E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-Mail Address" name="email" value="{{ old('email') }}" >
                        <div class="email"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for = "status">Status</label>
                        <select class="custom-select" name="status">
                            <option disabled selected>Selete User Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <div class="status"></div>
                    </div>

                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>User's Role</label>
                        <select class="custom-select" name="role">
                            <option disabled selected>Select Role For User</option>
                            <option value="author">Author</option>
                            <option value="editor">Editor</option>
                        </select>
                        <div class="role"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{old ('password') }}">
                        <div class="password"></div>
                    </div>
                </div>

                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password" name="password_confirmation">
                        <div class="password_confirmation"></div>
                    </div>
                </div>
                <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
        </div>
    </div>
</div>
