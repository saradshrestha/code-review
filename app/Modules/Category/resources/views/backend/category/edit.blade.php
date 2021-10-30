<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="categoryUpdate" data-id="{{ $category->id }}">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Category Title" name="title" value="{{ $category->title ?? old('title') }}">
                        <div class="title"></div>
                    </div>
                </div>
                 <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="placeholder js-states form-control" name="status">
                            <option disabled>Select Category Status</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                        <div class="status"></div>
                    </div>
                    <div class="status"></div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Select Main Category</label>
                        <select class="placeholder js-states form-control" name="parent_id">
                            <option value="0">Set as Main Category</option>
                             @foreach($categories as $cat )
                             <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}> {{ $cat->title }}</option>
                             @endforeach
                        </select>
                        <div class="parent_id"></div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                    <button class="btn btn-warning" data-dismiss="modal">Discard</button>
                </div>
            </form>
        </div>
    </div>
</div>

