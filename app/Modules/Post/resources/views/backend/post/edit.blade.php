<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editPostLabel">Edit Post</h5>
        </div>
        <div class="modal-body">
            <form id="postEdit" data-id="{{ $post->id }}">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" placeholder = "Enter Title" value="{{ $post->post_title ?? old}}">
                        <div class="post_title"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="post_content">Post Content</label>
                        <textarea class="form-control" id = "summernote" rows="4" name="post_content">{{ $post->post_content}}</textarea>
                        <div class="post_content"></div>
                    </div>
                </div>
                 <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="form-control" name="post_status">
                            <option disabled>Select Post Status</option>
                            <option value="1" @if($post->post_status == 1) selected  @endif>Active</option>
                            <option value="0" @if($post->post_status == 0) selected  @endif>Inactive</option>
                        </select>
                        <div class="post_status"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Published</label>
                        <select class="form-control" name="is_published">
                            <option disabled selected>Select Post Publish</option>
                            <option value="1" {{ $post->is_published == 1 ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $post->is_published == 0 ? 'selected' : '' }}>Unpublish</option>
                        </select>
                        <div class="is_published"></div>
                    </div>
                </div>
                <div class="custom-file-container" data-upload-id="updateImage">
                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" name="imageNames[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                    <div class="imageNames"></div>

                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
                <button class="btn btn-warning" data-dismiss="modal">Discard</button>
            </form>
        </div>
    </div>
</div>

{{-- File Upload Review For Edit--}}
<script>
    @if(isset($post->postImages))
        @foreach ( $post->postImages as $postImage)
            var importedBaseImage = "{{ asset('storage/'.$postImage->imagePath.$postImage->imageName) }}";
        @endforeach
        var secondUpload = new FileUploadWithPreview("updateImage",
        {
            images:{
                baseImage:importedBaseImage,
            },
        })
        @else
        var secondUpload = new FileUploadWithPreview('updateImage');
    @endif
</script>

{{-- Summer Note --}}
<script>
    $('#summernote').summernote({
        tabsize: 1,
        height: 150,
        placeholder: 'Write Something Here...',
    });
</script>
