<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="changePasswordLabel">Change Your Password</h5>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="newPasswordSubmit" data-id="{{ Auth()->id() }}">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" placeholder="Enter Current Password" name="current_password">
                        <div class="current_password"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="Enter Password" name="new_password">
                        <div class="new_password"></div>
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
                <button type = "submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div>
    </div>
</div>









