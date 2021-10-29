<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5>Create Category</h5>
        </div>
        <div class="modal-body">
            <form id="categoryStore" enctype="multipart/form-data">
                @csrf
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Category Title" name="title" value="{{old ('title') }}">
                        <div class="title"></div>
                    </div>
                </div>
                 <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="placeholder js-states form-control" name="status">
                            <option disabled selected>Select Category Status</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        <div class="status"></div>
                    </div>

                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Select Main Category</label>
                        <select class="placeholder js-states form-control" name="parent_id">
                            <option value="0" selected>Set as Main Category</option>
                            @foreach($categories as $category )
                                <option value="{{$category->id}}" name="parent_id">{{$category->title}}</option>
                            @endforeach
                        </select>
                        <div class="parent_id"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-warning float-right" data-dismiss="modal">Discard</button>
            </form>
        </div>
    </div>
</div>

