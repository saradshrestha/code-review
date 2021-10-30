<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="passwordSubmit" data-id="{{ $user->id }}">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="email">User E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-Mail Address" name="email" value="{{ $user->email ?? old ('email') }}" disabled>
                        <div class="email"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Enter Password" name="new_password" required>
                        <div class="new_password"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password" name="password_confirmation" required>
                        <div class="password_confirmation"></div>
                    </div>
                </div>
                <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                <button type = "submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div>
    </div>
</div>







