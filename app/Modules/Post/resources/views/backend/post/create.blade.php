
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showPostLabel">Create Post</h5>
        </div>
        <div class="modal-body">
            <form  id="postStore" enctype="multipart/form-data">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" id="post_title" placeholder="Post Title" name="post_title">
                        <div class="post_title"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for = "summernote">Post Content</label>
                        <textarea class="form-control" id="summernote" name="post_content"></textarea>
                        <div class="post_content"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="form-control" name="post_status">
                            <option disabled selected>Select Post Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <div class="post_status"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Published</label>
                        <select class="form-control" name="is_published">
                            <option disabled selected>Select Post Publish</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                        <div class="is_published"></div>
                    </div>
                </div>
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file"  name="imageNames[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                    <div class="imageNames"></div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</a>
                <button class="btn btn-warning" data-dismiss="modal">Discard</button>
            </form>
        </div>
    </div>
</div>


{{-- File Upload Preview For Create  --}}
<script>
    var secondUpload = new FileUploadWithPreview('mySecondImage');
</script>


{{-- Summer Note --}}
<script>
    $('#summernote').summernote({
        tabsize: 1,
        height: 150,
        placeholder: 'Write Something Here...',
    });
</script>


